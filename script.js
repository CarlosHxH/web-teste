$(function () {
  class Pessoa {
    constructor(email, passw) {
      this.email = email;
      this.passw = passw;
      this.data = {
        userIcon: "assets/user.png",
      };
      this.auth();
    }

    generateQRCode(text) {
      new QRCode(document.getElementById("qrcode"), {
        text: text,
        width: $("#qrcode").width(),
        height: $("#qrcode").width(),
      });
    }
    formataCPF(cpf) {
      cpf = cpf.replace(/[^\d]/g, "");
      return cpf.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, "$1.$2.$3-$4");
    }

    async auth() {
      await fetch("https://anfibro.org/api/pessoa/")
        .then((e) => e.json())
        .then((e) => {
          const search = e.filter(
            (e) => e.email === this.email && e.senha === this.passw
          );
          const dados = Object.assign(this.data, search[0]);
          delete dados.senha;
          $("#userIcon").attr("src", dados.foto||"assets/user.png");
          /*$("#userIcon").attr("src", ()=>{
            return `https://anfibro.org/api/pessoa/${dados.foto}`
          });*/
          $("#nome").text(dados.nome);
          $("#cpf").text(this.formataCPF(dados.cpf));
          $("#cidade").text(dados.cidade);
          $("#situacao").text(dados.situacao);
          $("#emissao").text(dados.emissao);
          $("#validade").text(dados.validade);
          $("#view").show();
          this.generateQRCode(dados.mumeroCarteira);
        })
        .catch((e) => console.warn(e));
    }
  }
  //new Pessoa("cleybson@gmail.com", "7kbwcWmq");
  //new Pessoa("admin@localhost", "j2kiWhYN");
  new Pessoa("", "123");

  $('#export').click(function(){
    window.print();
    return false;
  });
});