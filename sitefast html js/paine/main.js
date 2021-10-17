const KEY_BD = '@usuariosestudo'

var listaRegistros = {
    ultimoIdGerado: 0,
    usuarios: []
}

var FILTRO = ''


function gravarBD() {
    localStorage.setItem(KEY_BD, JSON.stringify(listaRegistros))
}

function lerBD() {
    const data = localStorage.getItem(KEY_BD)
    if (data) {
        listaRegistros = JSON.parse(data)
    }
    desenhar()
}

function pesquisar(value) {
    FILTRO = value;
    desenhar()
}

function desenhar() {
    const tbody = document.getElementById('listaRegistrosBody')
    if (tbody) {
        var data = listaRegistros.usuarios;
        if (FILTRO.trim()) {
            const expReg = eval(`/${FILTRO.trim().replace(/[^\d\w]+/g,'.*')}/i`)
            data = data.filter(usuario => {
                return expReg.test(usuario.produto) || expReg.test(usuario.valor)
            })
        }
        data = data
            .sort((a, b) => {
                return a.produto < b.produto ? -1 : 1
            })
            .map(usuario => {
                return `<tr>
                        <td>${usuario.id}</td>
                        <td>${usuario.produto}</td>
                        <td>${usuario.valor}</td>
                        <td>${usuario.qt}</td>
                        <td>${usuario.vpaq}</td>
                        <td>
                            <button onclick='vizualizar("cadastro",false,${usuario.id})'>Editar</button>
                            <button class='vermelho' onclick='perguntarSeDeleta(${usuario.id})'>Deletar</button>
                        </td>
                    </tr>`
            })
        tbody.innerHTML = data.join('')
    }
}

function insertUsuario(produto, valor, qt) {
    const id = listaRegistros.ultimoIdGerado + 1;
    listaRegistros.ultimoIdGerado = id;
    listaRegistros.usuarios.push({
        id,
        produto,
        valor,
        qt,
    })
    gravarBD()
    desenhar()
    vizualizar('lista')
}

function editUsuario(id, produto, valor, qt) {
    var usuario = listaRegistros.usuarios.find(usuario => usuario.id == id)
    usuario.produto = produto;
    usuario.valor = valor;
    usuario.qt = qt;
    gravarBD()
    desenhar()
    vizualizar('lista')
}

function deleteUsuario(id) {
    listaRegistros.usuarios = listaRegistros.usuarios.filter(usuario => {
        return usuario.id != id
    })
    gravarBD()
    desenhar()
}

function perguntarSeDeleta(id) {
    if (confirm('Quer deletar o registro de id ' + id)) {
        deleteUsuario(id)
    }
}

function limparEdicao() {
    document.getElementById('produto').value = ''
    document.getElementById('valor').value = ''
    document.getElementById('qt').value = ''
}

function vizualizar(pagina, novo = false, id = null) {
    document.body.setAttribute('page', pagina)
    if (pagina === 'cadastro') {
        if (novo) limparEdicao()
        if (id) {
            const usuario = listaRegistros.usuarios.find(usuario => usuario.id == id)
            if (usuario) {
                document.getElementById('id').value = usuario.id
                document.getElementById('produto').value = usuario.produto
                document.getElementById('valor').value = usuario.valor
                document.getElementById('qt').value = usuario.qt
            }
        }
        document.getElementById('produto').focus()
    }
}



function submeter(e) {
    e.preventDefault()
    const data = {
        id: document.getElementById('id').value,
        produto: document.getElementById('produto').value,
        valor: document.getElementById('valor').value,
        qt: document.getElementById('qt').value,
    }
    if (data.id) {
        editUsuario(data.id, data.produto, data.valor, data.qt)
    } else {
        insertUsuario(data.produto, data.valor, data.qt)
    }
}

window.addEventListener('load', () => {
    lerBD()
    document.getElementById('cadastroRegistro').addEventListener('submit', submeter)
    document.getElementById('inputPesquisa').addEventListener('keyup', e => {
        pesquisar(e.target.value)
    })

})

var vpaq = valor * qt ;



    gravarBD()
    desenhar()
    vizualizar('lista')