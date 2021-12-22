<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Projeto JavaSrcipt</title>

  <link rel="stylesheet" href="./css/style.css">

</head>
<body>
  <header>
    <h1>Consórcio IESB</h1>
  </header>
  
  <main>
    <div class="title">
      <h2>Carros</h2>
      <span>Lista de carros da loja</span>
      <br>
      <small>Todos os carros comprados em até 10 parcelas, não terão juros! Taxa de juros 2% por parcela</small>
      <div id="carros">
      </div>
    </div>
    
    <div class="card">
      <div class="lineInput">
        <label for="produto">Carro</label>
        <input class="desativado" type="text" id="produto" placeholder="Nome do carro" readonly>
      </div>

      <div class="lineInput">
        <label for="parcelas">Parcelas</label>
        <select onchange="consecionaria.calcular()" id="parcelas" class="optionParcela">
        </select>
      </div>

      <div class="lineInput">
        <label for="valor">Preço</label>
        <input class="desativado" type="text" id="preco" placeholder="Preço do carro" readonly>
      </div>

      <div class="lineInput">
        <label for="valor">Valor por parcela</label>
        <input class="desativado" type="text" id="precoParcela" placeholder="Preço da parcela" readonly>
      </div>

      <div class="lineInput">
        <label for="valor">Valor total com juros</label>
        <input class="desativado" type="text" id="juros" placeholder="Valor com juros" readonly>
      </div>
      
      <button id="btn1" onclick="consecionaria.salvar()">Salvar</button>
      <button onclick="consecionaria.cancelar()">Cancelar</button>
    </div>
    
    <div class="content">
      <table border="1">
        <Thead>
          <th>ID</th>
          <th>CARRO</th>
          <th>PARCELAS</th>
          <th>VALOR DA PARCELA</th>
          <th>VALOR</th>
          <th>TOTAL C/JUROS</th>
          <th>AÇÕES</th>
        </Thead>
        <Tbody id="tbody">        
        </Tbody>
      </table>
    </div>
  </main>
  <script src="./js/script.js"></script>
</body>
</html>