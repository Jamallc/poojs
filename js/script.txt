class Consecionaria {
  constructor() {
    this.id = 1;
    this.arrayConsorcios = [];
    this.editId = null;
    this.arrayCarros = [
      { idCarro: '1', nomeCarro: 'AMAROK', precoCarro: '224990' },
      { idCarro: '2', nomeCarro: 'GOL', precoCarro: '53000' },
      { idCarro: '3', nomeCarro: 'JETTA', precoCarro: '145890' },
      { idCarro: '4', nomeCarro: 'NIVUS', precoCarro: '124800' },
      { idCarro: '5', nomeCarro: 'POLO', precoCarro: '76900' },
      { idCarro: '6', nomeCarro: 'SAVERO', precoCarro: '113250' },
      { idCarro: '7', nomeCarro: 'TAOS', precoCarro: '168490' },
      { idCarro: '8', nomeCarro: 'VIRTUS', precoCarro: '68230' },
      { idCarro: '9', nomeCarro: 'VOYAGE', precoCarro: '79590' }
    ]
  }

  salvar() {
    let consorcio = this.lerDados();

    if (this.validaCampos(consorcio)) {
      if (this.editId == null) {
        this.adicionar(consorcio)
      } else {
        this.atualizar(this.editId, consorcio)
      }
    }

    this.listaTabela()
    this.cancelar()
  }

  listaTabela() {
    let tbody = document.getElementById("tbody");
    tbody.innerText = '';

    for (let i = 0; i < this.arrayConsorcios.length; i++) {
      let tr = tbody.insertRow();

      let td_id = tr.insertCell();
      let td_produto = tr.insertCell();
      let td_parcelas = tr.insertCell();
      let td_valorParcelas = tr.insertCell();
      let td_preco = tr.insertCell();
      let td_total = tr.insertCell();
      let td_acoes = tr.insertCell();

      td_id.innerText = this.arrayConsorcios[i].id
      td_produto.innerText = this.arrayConsorcios[i].nomeProduto
      td_parcelas.innerText = this.arrayConsorcios[i].parcelaProduto
      td_valorParcelas.innerText = this.arrayConsorcios[i].valorParcelaProduto
      td_preco.innerText = this.arrayConsorcios[i].precoProduto
      td_total.innerText = this.arrayConsorcios[i].total
      td_acoes.innerHTML = `
        <svg title="Editar" 
          onclick="consecionaria.preparaEdicao(${this.arrayConsorcios[i].id}, 
            '${this.arrayConsorcios[i].nomeProduto}', 
            '${this.arrayConsorcios[i].precoProduto}', 
            '${this.arrayConsorcios[i].parcelaProduto}', 
            '${this.arrayConsorcios[i].valorParcelaProduto}', 
            '${this.arrayConsorcios[i].total}')" 
          aria-hidden="true" 
          focusable="false" 
          data-prefix="fas" 
          data-icon="edit" 
          class="edit svg-inline--fa fa-edit fa-w-18" 
          role="img" 
          xmlns="http://www.w3.org/2000/svg" 
          viewBox="0 0 576 512"><path 
          fill="currentColor" 
          d="M402.6 83.2l90.2 90.2c3.8 3.8 3.8 10 0 13.8L274.4 405.6l-92.8 10.3c-12.4 
          1.4-22.9-9.1-21.5-21.5l10.3-92.8L388.8 83.2c3.8-3.8 10-3.8 13.8 0zm162-22.9l-48.8-48.8c-15.2-15.2-39.9-15.2-55.2 
          0l-35.4 35.4c-3.8 3.8-3.8 10 0 13.8l90.2 90.2c3.8 3.8 10 3.8 13.8 0l35.4-35.4c15.2-15.3 15.2-40 0-55.2zM384 
          346.2V448H64V128h229.8c3.2 0 6.2-1.3 8.5-3.5l40-40c7.6-7.6 2.2-20.5-8.5-20.5H48C21.5 64 0 85.5 0 112v352c0 
          26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V306.2c0-10.7-12.9-16-20.5-8.5l-40 40c-2.2 2.3-3.5 5.3-3.5 8.5z"></path>
        </svg>
        <svg title="Cancelar" 
          onclick="consecionaria.deletar(${this.arrayConsorcios[i].id})" 
          aria-hidden="true" 
          focusable="false" 
          data-prefix="fas" 
          data-icon="trash" 
          class="trash svg-inline--fa fa-trash fa-w-14" 
          role="img" 
          xmlns="http://www.w3.org/2000/svg" 
          viewBox="0 0 448 512"><path 
          fill="currentColor" 
          d="M432 32H312l-9.4-18.7A24 24 0 0 0 
          281.1 0H166.8a23.72 23.72 0 0 0-21.4 
          13.3L136 32H16A16 16 0 0 0 0 48v32a16 
          16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 
          16 0 0 0-16-16zM53.2 467a48 48 0 0 0 47.9 
          45h245.8a48 48 0 0 0 47.9-45L416 128H32z"></path>
        </svg>
      `
    }

    console.log(this.arrayConsorcios)
  }

  adicionar(produto) {
    this.arrayConsorcios.push(produto);
    this.id++;
  }

  atualizar(id, produto) {
    for (let i = 0; i < this.arrayConsorcios.length; i++) {
      if (this.arrayConsorcios[i].id == id) {
        this.arrayConsorcios[i].nomeProduto = produto.nomeProduto
        this.arrayConsorcios[i].precoProduto = produto.precoProduto
        this.arrayConsorcios[i].parcelaProduto = produto.parcelaProduto
        this.arrayConsorcios[i].valorParcelaProduto = produto.valorParcelaProduto
        this.arrayConsorcios[i].total = produto.total
      }
    }
  }

  lerDados() {
    let consorcio = {};
    consorcio.id = this.id;
    consorcio.nomeProduto = document.getElementById("produto").value;
    consorcio.precoProduto = document.getElementById("preco").value;
    consorcio.parcelaProduto = document.getElementById("parcelas").value;
    consorcio.valorParcelaProduto = document.getElementById("precoParcela").value;
    consorcio.total = document.getElementById("juros").value;

    return consorcio;
  }

  validaCampos(consorcio) {
    let msg = '';

    if (consorcio.nomeProduto == "") {
      msg += '- Informe o nome do Produto \n';
    }

    if (consorcio.precoProduto == "") {
      msg += '- Informe o preço do Produto \n';
    }

    if (msg != '') {
      alert(msg);
      return false;
    }

    return true;
  }

  cancelar() {
    document.getElementById("produto").value = '';
    document.getElementById("preco").value = '';
    document.getElementById("precoParcela").value = '';
    document.getElementById("juros").value = '';
    document.getElementById('btn1').innerText = "Salvar"
    this.editId = null;
  }

  deletar(id) {
    if (confirm(`Deseja realmente deletar o produto do ID ${id}?`)) {
      let tbody = document.getElementById("tbody");

      for (let i = 0; i < this.arrayConsorcios.length; i++) {
        if (this.arrayConsorcios[i].id == id) {
          this.arrayConsorcios.splice(i, 1);
          tbody.deleteRow(i)
        }
      }
    }
  }

  preparaEdicao(id, nomeProduto, precoProduto, parcelaProduto, valorParcelaProduto, total) {
    document.getElementById('produto').value = nomeProduto
    document.getElementById('preco').value = precoProduto
    document.getElementById("parcelas").value = parcelaProduto;
    document.getElementById("precoParcela").value = valorParcelaProduto;
    document.getElementById("juros").value = total;
    document.getElementById('btn1').innerText = "Atualizar"
    this.editId = id;
  }

  listarCarros() {
    let carros = document.getElementById('carros')
    let parcelas = document.getElementById('parcelas')
    let fotosCarros = '';
    let parcelasCarros = '';

    for (let i = 0; i < this.arrayCarros.length; i++) {
      fotosCarros += `
        <div class="carro" onclick="consecionaria.selecionarCarro(${this.arrayCarros[i].idCarro})">
          <img src="./img/${this.arrayCarros[i].nomeCarro}.png">
          <p>${this.arrayCarros[i].nomeCarro}</p>
          <small>${parseFloat(this.arrayCarros[i].precoCarro).toLocaleString('pt-br',{style: 'currency', currency: 'BRL', minimumFractionDigits: 2})}</small>
        </div>
      `
    }

    for (let i = 1; i <= 45; i++) {
      parcelasCarros += `
        <option class="optionParcela" value="${i}">${i}x</option>
      `
    }

    parcelas.innerHTML = parcelasCarros;
    carros.innerHTML = fotosCarros;
  }

  selecionarCarro(id) {
    for (let i = 0; i < this.arrayCarros.length; i++) {
      if (this.arrayCarros[i].idCarro == id) {
        document.getElementById("produto").value = this.arrayCarros[i].nomeCarro;
        document.getElementById("preco").value = parseFloat(this.arrayCarros[i].precoCarro).toLocaleString('pt-br',{style: 'currency', currency: 'BRL', minimumFractionDigits: 2});
      }
    }
    this.calcular()
  }

  calcular() {
    let valor = document.getElementById("preco").value;
    let valorParcela = 0;
    valor = valor.replace('R$', '')
    valor = valor.replace(' ', '')
    valor = valor.replace(',00', '')
    valor = valor.replace('.', '')
    let parcela = document.getElementById("parcelas").value;
    let valorpresente = valor / parcela;
    if(parcela > 10) {
      valorParcela = valorpresente*(1 + 0.02 * parcela)
    } else {
      valorParcela = valor / parcela;
    }

    let valorTotal = valorParcela * parcela;

    console.log(valorParcela, valorTotal)

    document.getElementById("precoParcela").value = parseFloat(valorParcela).toLocaleString('pt-br',{style: 'currency', currency: 'BRL', minimumFractionDigits: 2});
    document.getElementById("juros").value = parseFloat(valorTotal).toLocaleString('pt-br',{style: 'currency', currency: 'BRL', minimumFractionDigits: 2});
  }
}

var consecionaria = new Consecionaria()
window.onload = consecionaria.listarCarros()
