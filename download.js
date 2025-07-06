import{getDados} from './script.js';
const form = document.querySelector("#formulario");


document.getElementById("baixar").addEventListener("click",async function(e){
  e.preventDefault();

  const dados = getDados();

const jsonString = JSON.stringify(dados, null, 2);
const blob = new Blob([jsonString], { type: "application/json" });

  const url = URL.createObjectURL(blob);
  const a = document.createElement("a");
  a.href = url;
  a.download = `livro-${dados.titulo.replace(/\s+/g, "_")}.json`;
  a.className = "a";
  a.click();

  setTimeout(() => URL.revokeObjectURL(url), 1000);

})