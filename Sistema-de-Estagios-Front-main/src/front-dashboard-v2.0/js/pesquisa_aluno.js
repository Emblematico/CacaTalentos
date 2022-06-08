document.querySelector("#campoPesquisaAluno").addEventListener("keyup", async (e) => {
    let pesquisa = await fetch("busca_aluno.php?pesquisa="+e.target.value)
        .then((data) => data.text())
        .then((text) => text)
    document.querySelector("#resultadoAluno").innerHTML = pesquisa;
});
document.querySelector("#campoPesquisaAluno").dispatchEvent(new Event("keyup"));