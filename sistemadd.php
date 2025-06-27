<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="addlivro.css">
    <title>Document</title>
</head>
<body>
    <main>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="file" id="imagem" name="imagem" accept="image/*">
            <section>
                <input type="text" placeholder="nome do livro">
                <br>
                <input type="number" placeholder="n de páginas">
                <br>
                <select id="faixa-etaria" name="faixa-etaria">
                    <option value="" disabled selected>faixa etária</option>
                    <option value="0">L</option>
                    <option value="1">10</option>
                    <option value="2">12</option>
                    <option value="3">14</option>
                    <option value="4">16</option>
                    <option value="5">18</option>
                </select>
                <br>
                <input type="text" placeholder="autor" required>
                <br>
                <input type="text" placeholder="tradutor (opcional)" n>
                <br>
                <input type="text" placeholder="nacionalidade" required>
                <br>
                <textarea name="" placeholder="texto de importância para o estudo" id="textoG" required></textarea>
                <br>
                <textarea name="" placeholder="texto de importância para o lazer" id="textoG" required></textarea>
                <br>
                <textarea id="textoG" placeholder="Sinopse do livro" required></textarea>
                <br>
                <input type="checkbox" placeholder="é para estudo"><p>é para estudo</p>
                <br>
                <input type="checkbox" placeholder="é para lazer"><p>é para lazer</p>
                <br>
                <input type="text" placeholder="nivel de dificuldade" required >
                <br>
                <textarea name="" placeholder="texto sobre a dificuldade" required id=""></textarea>
                <br><br>
                <button type="submit">Enviar</button>
            </section>
        </form>
    </main>


    <script>
        var imagem = document.querySelector("#imagem");
        document.querySelector("#imagem").addEventListener("change" , (e) => {
            const imgi = document.querySelector("#imagem").files[0];
            e.preventDefault();

            const imgi1 = URL.createObjectURL(imgi);
            imagem.style.backgroundImage = 'url("'+imgi1+'")';
            console.log(imgi);
        })

    </script>

    <?php 

/*-------------------------------------------conexão--------------------------------------------------*/
class Conexao{
    private static $instance;

    public static function getConn(){
        if (!isset(self::$instance)) {
            self::$instance = new \PDO('mysql:host=localhost;dbname=clube do livro;charset=utf8', 'root', '');
        }

        return self::$instance;
    }
}












/*--------------------------------criação das classes dos arquivos----------------------------------------*/
class Livro {

    private $nLivro, $nPaginas, $faixa, $tradutor, $nacionalidade, $importanciaE, $importanciaL, $sinopse, $el, $nDificuldade, $tDificuldade, $capa, $data, $autorId;

    // nLivro
    public function getLivro() {
        return $this->nLivro;
    }

    public function setLivro($nLivro) {
        $this->nLivro = $nLivro;
    }

    // nPaginas
    public function getPaginas() {
        return $this->nPaginas;
    }

    public function setPaginas($nPaginas) {
        $this->nPaginas = $nPaginas;
    }

    // faixa
    public function getFaixa() {
        return $this->faixa;
    }

    public function setFaixa($faixa) {
        $this->faixa = $faixa;
    }

    // tradutor
    public function getTradutor() {
        return $this->tradutor;
    }

    public function setTradutor($tradutor) {
        $this->tradutor = $tradutor;
    }

    // nacionalidade
    public function getNacionalidade() {
        return $this->nacionalidade;
    }

    public function setNacionalidade($nacionalidade) {
        $this->nacionalidade = $nacionalidade;
    }

    // importanciaE
    public function getImportanciaE() {
        return $this->importanciaE;
    }

    public function setImportanciaE($importanciaE) {
        $this->importanciaE = $importanciaE;
    }

    // importanciaL
    public function getImportanciaL() {
        return $this->importanciaL;
    }

    public function setImportanciaL($importanciaL) {
        $this->importanciaL = $importanciaL;
    }

    // sinopse
    public function getSinopse() {
        return $this->sinopse;
    }

    public function setSinopse($sinopse) {
        $this->sinopse = $sinopse;
    }

    // el
    public function getEl() {
        return $this->el;
    }

    public function setEl($el) {
        $this->el = $el;
    }

    // nDificuldade
    public function getNDificuldade() {
        return $this->nDificuldade;
    }

    public function setNDificuldade($nDificuldade) {
        $this->nDificuldade = $nDificuldade;
    }

    // tDificuldade
    public function getTDificuldade() {
        return $this->tDificuldade;
    }

    public function setTDificuldade($tDificuldade) {
        $this->tDificuldade = $tDificuldade;
    }

    public function getCapa() {
    return $this->capa;
    }

    public function setCapa($capa) {
        $this->capa = $capa;
    }

    // data
    public function getData() {
        return $this->data;
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function getAutor() {
        return $this->autorId;
    }

    public function setAutor($autorId) {
        $this->autorId = $autorId;
    }
}
    // autorId



class Autor {
    private $nome;
    private $paisId;

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }
}










/*--------------------------------criação das classesDao dos arquivos----------------------------------------*/
class AutorDao{
    public function createAutor(Livro $a){
        $sqla = "INSERT INTO autores (nome, pais_id) VALUES (?, ?)";

        $ss = Conexao::getConn()->prepare($sql);
        $ss->bindValue(1, $a->getAutor());
        $autorId = Conexao::getConn()->lastInsertId();

    }
}

class LivroDao{
    public function create(Livro $l){
        $sql = "INSERT INTO livros (titulo, n_paginas, faixa_etaria, tradutor, lazer, estudo, sinopse, el, dificuldade_text, dificuldade_nivel, capa, data, autor_id ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $l->getLivro());
        $stmt->bindValue(2, $l->getPaginas());           // n_paginas
        $stmt->bindValue(3, $l->getFaixa());             // faixa_etaria
        $stmt->bindValue(4, $l->getTradutor());          // tradutor
        $stmt->bindValue(5, $l->getImportanciaL());      // lazer
        $stmt->bindValue(6, $l->getImportanciaE());      // estudo
        $stmt->bindValue(7, $l->getSinopse());           // sinopse
        $stmt->bindValue(8, $l->getEl());                // el
        $stmt->bindValue(9, $l->getTDificuldade());      // dificuldade_text
        $stmt->bindValue(10, $l->getNDificuldade());     // dificuldade_nivel
        $stmt->bindValue(11, $l->getCapa());             // capa
        $stmt->bindValue(12, $l->getData());             // data
        $stmt->bindValue(13, $l->getAutor()); 

        $stmt->execute();
}












/*-----------------------------------------execução-----------------------------------------------------*/
}

$livroDao = new LivroDao();

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    
}
    ?>
</body>
</html>