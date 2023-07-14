$(function () {
  /**
   * carregar tela de login
   */
  $("#root").load("./ajax/login.html");

  /** Login Automatico com dados em cache */
  localStorage.getItem("user") &&
    populateCard(JSON.parse(localStorage.getItem("user")));

  /** Exclusão dos dados em cache */
  $(document).on("click", "#logout", () => {
    localStorage.clear();
    $("#root").load("./ajax/login.html");
  });

  /**
   * Alterar pagina "Login" e "Esqueceu senha"
   */
  $(document).on("click", ".toggle", function (e) {
    e.preventDefault();
    const toggle = $(this).attr("data-id");
    toggle === "login" && $("#root").load("/ajax/login.html");
    toggle === "forgot" && $("#root").load("/ajax/forgot.html");
    return false;
  });

  /**
   *
   * Recuperar senha
   */

  $(document).on("submit", "#forgotForm", function (event) {
    event.preventDefault();
    let cpf = $("#cpf").val().replace(/[^\d]/g, "");

    if (cpf.trim().length != 11) {
      $("#erros").text("Preencha todos os campos.").fadeIn(1000).fadeOut(5000);
      return false;
    }
    $.ajax({
      url: "https://anfibro.org/carteiras/ajax/senha/",
      type: "POST",
      dataType: "json",
      data: JSON.stringify({ cpf: cpf }),
      success: function (data) {
        $("#erros")
          .text(data.error || "Verifique seu email!")
          .fadeIn(500)
          .fadeOut(5000);
        $("#root").load("./ajax/login.html");
      },
      error: function (jqXHR, textStatus, errorThrown) {
        $("#root").load("./ajax/login.html", () => {
          $("#erros").text("Verifique seu email.").fadeIn(1000).fadeOut(5000);
        });
      },
    });
    return false;
  });

  /**
   * Login
   */
  $(document).on("submit", "#loginForm", function (event) {
    event.preventDefault();
    let cpf = $("#cpf").val().replace(/[^\d]/g, "");
    let senha = $("#password").val().trim();

    try {
      if (cpf.trim().length != 11 || senha.trim() === "") throw new Error("Preencha todos os campos.")
      auth({ username: cpf, password: senha });
    } catch (error) {
      $("#erros").text(error.message).fadeIn(1000).fadeOut(5000);
    }
    return false;
  });

  /**
   *
   * @param {Object: {username,password}} data
   */
  const auth = async (data) => {
    $.ajax({
      url: "https://anfibro.org/api/pessoa/",
      type: "POST",
      dataType: "json",
      data: JSON.stringify(data),
      success: function (data) {
        if (data.error) {
          return $("#erros").text(data.error).fadeIn(1000).fadeOut(5000);
        }
        data = data[0];
        localStorage.setItem("user", JSON.stringify(data));
        populateCard(data);
      },
      error: function (jqXHR, textStatus, errorThrown) {
        $("#erros").text(errorThrown).fadeIn(1000).fadeOut(5000);
      },
    });
  };

  /**
   * Popular card
   * @param {Object} data
   */
  function populateCard(data) {
    $("#root").load("./ajax/card.html", () => {
      setTimeout(() => {
        $("#foto").attr("src",`data:${data.foto_mime};base64,${data.foto}`);
        $("#nome").text(data.nome || "");
        $("#cid").text(data.cid || "10-M797");
        $("#cpf").text(data.cpf || "");
        $("#cidade").text(`${data.cidade}-${data.estado}`);
        $("#emissao").text(data.emissao.split("-").reverse().join("/") || "");
        $("#validade").text(data.validade.split("-").reverse().join("/") || "");
        $("#situacao").text(data.situacao || "ATIVO");
        $("#qrcode").html("").qrcode(data.numeroCarteira || "");
      }, 100);
    });
  }
});
