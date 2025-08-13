 const searchInput = document.getElementById('searchUsuario');
    searchInput.addEventListener('input', function() {
        const termo = this.value.trim();
        if (termo.length === 0) {
            location.reload();
            return;
        }
        fetch(`../database/buscarUsuarios.php?q=${encodeURIComponent(termo)}`)
            .then(response => response.json())
            .then(usuarios => {
                let html = '';
                usuarios.forEach(usuario => {
                    html += `<tr class="btn-usuario" data-id="${usuario.id}" style="cursor: pointer;">
                    <td>${usuario.nome}</td>
                    <td>${usuario.email}</td>
                    <td>${new Date(usuario.data_criacao).toLocaleDateString('pt-BR')}</td>
                    <td><span class="badge bg-success">${usuario.nivel}</span></td>
                </tr>`;
                });
                document.querySelector('.usuarios').innerHTML = html;
            });
    });

    document.querySelectorAll(' .btn-usuario').forEach(btn => {
        btn.addEventListener('click', function() {
            const btnAgendarServico = document.getElementById('btnAgendarServico');
            btnAgendarServico.classList.remove('d-none')
            const usuarios = document.querySelector('.usuarios');
            usuarios.classList.add('d-none');
            const userId = this.getAttribute('data-id');
            document.getElementById('usuarioSelecionadoId').value = userId;
            fetch(`../database/getServicos.php?id=${userId}`)
                .then(response => response.json())
                .then(data => {
                    const container = document.getElementById('servicosUsuario');
                    let html = '';

                    if (data.length > 0) {

                        html +=
                            `<div class="alert alert-info">Veja os Serviços pendentes a seguir!<i class="fas fa-arrow-left float-end"
                                style="font-size:8pt; margin-top:8px;cursor:pointer;" id="voltar">Voltar</i></div>`;
                        html += `<ul class="list-group">`;
                        data.forEach(servico => {
                            html += `<li class="list-group-item">
                                <strong>Tipo Serviço:</strong> ${servico.tipo_servico}<br>
                                <strong>Data de Início:</strong> ${servico.data_inicio}<br>
                                <strong>Data de Término:</strong> ${servico.data_termino}<br>

                                <div class="mt-2">

                                    <button class="btn btn-sm btn-outline-secondary"
                                        onclick="remarcarConsulta(${servico.userId})">
                                        <i class="fas fa-edit me-1"></i> Remarcar
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger"
                                        onclick="cancelarConsulta(${servico.userId})">
                                        <i class="fas fa-times me-1e"></i> Cancelar
                                    </button>
                                </div>
                            </li>
                            `;
                        });
                        html += `</ul>`;
                    } else {
                        html =
                            '<div class="alert alert-warning" id="avisoConsulta">Nenhuma Servico Agendado Encontrado!</div><i class = "fas fa-arrow-left float-end" style = "font-size:8pt; margin-top:8px;cursor:pointer;" id = "voltar" > Voltar < /i></div > ';

                    }

                    container.innerHTML = html;
                    container.classList.remove('d-none');

                    setTimeout(() => {
                        const voltar = document.querySelector("#voltar");
                        const btnAgendarServico = document.getElementById(
                            'btnAgendarServico');
                        if (voltar) {
                            voltar.addEventListener('click', () => {
                                container.classList.add('d-none');
                                usuarios.classList.remove('d-none')
                                container.innerHTML = ''
                                btnAgendarServico.classList.add('d-none')
                            })
                        }
                    }, 0);
                });
        });
    });

    function agendarServico() {
        const modal = new bootstrap.Modal(document.getElementById('modalAgendarServico'));
        modal.show();
    }