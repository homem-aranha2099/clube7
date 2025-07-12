let jsonString = null;
let imagemBase64 = null;
let dados = null; // agora declarada corretamente
const form = document.querySelector("#formulario");

/*--------- Função de ler arquivos ----------*/
function ler(arquivo) {
  return new Promise((resolve, reject) => {
    const reader = new FileReader();

    reader.onload = () => resolve(reader.result);
    reader.onerror = () => reject("Erro ao ler o arquivo.");

    reader.readAsDataURL(arquivo);
  });
}

/*--------- Função para calcular o valor de estudo/lazer ----------*/
const calcel = function () {
  const estudoC = document.querySelector("#estudo");
  const lazerC = document.querySelector("#lazer");

  if (lazerC.checked && estudoC.checked) return 3;
  if (lazerC.checked) return 2;
  if (estudoC.checked) return 1;

  alert("Selecione pelo menos estudo ou lazer");
  return null;
};

/*--------- Função para montar os dados ----------*/
const montDados = function (base64Imagem, elValue) {
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
    pais: form.pais.value.trim(),
  };
};

/*--------- Só roda em telas maiores ----------*/
if (window.innerWidth > 768) {
  form.addEventListener("submit", async function (e) {
    e.preventDefault();

    const elValue = calcel();
    if (!elValue) return;

    const arquivoImagem = form.imagem.files[0];

    const base64Imagem = await ler(arquivoImagem);
    montDados(base64Imagem, elValue);

    const jsonString = JSON.stringify(dados, null, 2);
    const blob = new Blob([jsonString], { type: "application/json" });

    const url = URL.createObjectURL(blob);
    const a = document.createElement("a");
    a.href = url;
    a.download = `livro-${dados.titulo.replace(/\s+/g, "_")}.json`;
    a.className = "a";
    a.click();

    setTimeout(() => URL.revokeObjectURL(url), 1000);
  });
}else{
  const imagemInput = document.getElementById("imagem");
  
  imagemInput.type = "url"; // altera o tipo do campo no celular
  imagemInput.placeholder = "Copie o link da imagem da internet e cole aqui."

  form.addEventListener("submit", function (e) {
    e.preventDefault();

    const elValue = calcel();
    if (!elValue) return;

    const base64Imagem = imagemInput.value.trim();
    if (!base64Imagem.startsWith("http")) {
      alert("Insira uma URL válida para a imagem");
      return;
    }

    montDados(base64Imagem, elValue);

    const jsonString = JSON.stringify(dados, null, 2);
    const blob = new Blob([jsonString], { type: "application/json" });

    const url = URL.createObjectURL(blob);
    const a = document.createElement("a");
    a.href = url;
    a.download = `livro-${dados.titulo.replace(/\s+/g, "_")}.json`;
    a.className = "a";
    a.click();

    setTimeout(() => {
      URL.revokeObjectURL(url);
      form.reset()}, 1000);
  });
}

