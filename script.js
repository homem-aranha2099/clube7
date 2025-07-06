const botao = document.getElementById("baixar");

function ler(arquivo){
  return new Promise((resolve, reject) => {
    const reader = new FileReader();

  reader.onload = () => resolve(reader.result);
  reader.onerror = () => reject("erroa ao ler o arquivo.");

  reader.readAsDataURL(arquivo);
  })
}
var dados = null;

// Submit do formulário
const form = document.querySelector("#formulario");

form.addEventListener("submit", async function(e) {
  e.preventDefault();

  // Pegando a imagem
  const arquivoImagem = form.imagem.files[0];
  if (!arquivoImagem) {
    alert("Selecione uma imagem");
    return;
  }

  // Determinar valor de estudoLazer
  let elValue = 0;
  const estudoC = document.querySelector("#estudo");
  const lazerC = document.querySelector("#lazer");
  if (lazerC.checked && estudoC.checked) elValue = 3;
  else if (lazerC.checked) elValue = 2;
  else if (estudoC.checked) elValue = 1;
  else {
    alert("Selecione pelo menos estudo ou lazer");
    return;
  }

  let jsonString = null;

  // Iniciar FileReader
  const reader = new FileReader();

    const base64Imagem = await ler(arquivoImagem); // Aqui a imagem já está em base64

    // Montar os dados
    dados = {
      titulo: form.titulo.value.trim(),
      paginas: parseInt(form.paginas.value, 10),
      faixaEtaria: form.faixaEtaria.value.trim(),
      tradutor: form.tradutor.value.trim() || null,
      importanciaEstudos: form.importanciaEstudos.value.trim(),
      importanciaLazer: form.importanciaLazer.value.trim(),
      sinopse: form.sinopse.value.trim(),
      estudoLazer: elValue,
      nivelDificuldade: parseInt(form.nivelDificuldade.value, 10),
      textoDificuldade: form.textoDificuldade.value.trim(),
      imagemBase64: base64Imagem,
      dataLancamento: form.dataLancamento.value,
      autor: form.autor.value.trim(),
      pais: form.pais.value.trim()
    };

    // Converter em JSON e gerar blob
  });

function getDados(){
  return dados;


}

export {getDados};

