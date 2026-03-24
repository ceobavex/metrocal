<?php
// Arquivo: orcamento.php
// Caminho do include corrigido para ser mais portável
include '../components/header.php'; 
?>

<main>
    <section class="page-header-service">
        <div class="container">
            <h1>Solicite Seu Orçamento</h1>
        </div>
    </section>

    <section class="form-wrapper">
        <form id="quoteForm" class="quote-form">
            <div class="form-grid">
                <div class="form-group">
                    <label for="nome">Seu Nome *</label>
                    <input type="text" id="nome" required>
                </div>
                <div class="form-group">
                    <label for="empresa">Empresa</label>
                    <input type="text" id="empresa">
                </div>
                <div class="form-group">
                    <label for="email">E-mail *</label>
                    <input type="email" id="email" required>
                </div>
                <div class="form-group">
                    <label for="telefone">Telefone / WhatsApp *</label>
                    <input type="tel" id="telefone" required>
                </div>

                <div class="form-group full-width">
                    <label for="tipoServico">Tipo de Serviço *</label>
                    <select id="tipoServico" required>
                        <option value="">-- Selecione um serviço --</option>
                        <option value="Calibração">Calibração</option>
                        <option value="Assistência Técnica">Assistência Técnica</option>
                        <option value="Qualificação">Qualificação</option>
                        <option value="Outros">Outros Serviços</option>
                    </select>
                </div>

                <div class="form-group full-width" id="instrumentos-container">
                    <label>Selecione o(s) Instrumento(s)</label>
                    <div id="instrumentos-list" class="instrument-list">
                        </div>
                </div>

                <div class="form-group full-width">
                    <label for="mensagem">Mensagem Adicional</label>
                    <textarea id="mensagem" rows="5"></textarea>
                </div>
            </div>

            <button type="submit" class="btn btn-solid-blue btn-form">Enviar Orçamento</button>
        </form>
    </section>
</main>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // --- DADOS DOS SERVIÇOS E INSTRUMENTOS ---
    // ** LISTA COMPLETA E ATUALIZADA DE SERVIÇOS E INSTRUMENTOS **
    const servicosEInstrumentos = {
        'Calibração': [
            'Autoclave',
            'Balança Analítica',
            'Calibração de Instrumentos (Geral)',
            'Câmara Climática',
            'Centrífuga',
            'Condutivímetro',
            'Densímetro',
            'Densímetro Digital',
            'Equipamentos de Laboratório (Geral)',
            'Equipamentos de Medição (Geral)',
            'Espectrofotômetro',
            'Espectrofotômetro UV-VIS',
            'Estufa',
            'Manômetro',
            'Medidor de pH',
            'Micrômetro',
            'Equipamentos Micronal',
            'Paquímetro',
            'pHmetro',
            'Relógio Comparador',
            'Termômetro',
            'Turbidímetro'
        ],
        'Assistência Técnica': [
            'Autoclave (Manutenção e Reparo)',
            'Estufa (Manutenção e Reparo)',
            'Espectrofotômetro (Manutenção e Reparo)',
            'pHmetro (Manutenção e Reparo)',
            'Fotômetro de Chama (Manutenção e Reparo)',
            'Equipamentos Micronal (Manutenção e Reparo)',
            'Equipamentos de Laboratório (Geral)',
            'Manutenção Preventiva (Plano)'
        ],
        'Qualificação': [
            'Qualificação de Autoclave',
            'Qualificação de Autoclaves e Estufas',
            'Qualificação de Equipamentos Binder',
            'Qualificação de Câmara Climática',
            'Qualificação de Capela de Fluxo Laminar',
            'Qualificação de Espectrofotômetro',
            'Qualificação de Estufas',
            'Qualificação Térmica (Geral)',
            'Qualificação Térmica de Autoclave'
        ],
        'Outros': [
            'Treinamentos técnicos',
            'Consultoria em metrologia',
            'Aferição de Equipamentos',
            'Aferição de Instrumentos',
        ]
    };

    const servicoSelect = document.getElementById('tipoServico');
    const instrumentosContainer = document.getElementById('instrumentos-container');
    const instrumentosListDiv = document.getElementById('instrumentos-list');

    // Função que mostra/esconde a lista de instrumentos
    servicoSelect.addEventListener('change', function() {
        const servicoSelecionado = this.value;
        const instrumentos = servicosEInstrumentos[servicoSelecionado];

        // Limpa a lista anterior
        instrumentosListDiv.innerHTML = '';

        if (instrumentos && instrumentos.length > 0) {
            instrumentos.forEach(instrumento => {
                const itemDiv = document.createElement('div');
                itemDiv.classList.add('instrument-item');

                const checkbox = document.createElement('input');
                checkbox.type = 'checkbox';
                checkbox.id = instrumento.replace(/\s+/g, '-'); // Cria um ID tipo "Calibracao-de-Autoclave"
                checkbox.name = 'instrumentos';
                checkbox.value = instrumento;

                const label = document.createElement('label');
                label.htmlFor = checkbox.id;
                label.textContent = instrumento;
                
                itemDiv.appendChild(checkbox);
                itemDiv.appendChild(label);
                instrumentosListDiv.appendChild(itemDiv);
            });
            instrumentosContainer.style.display = 'block'; // Mostra o container
        } else {
            instrumentosContainer.style.display = 'none'; // Esconde o container
        }
    });

    // --- LÓGICA DE ENVIO PARA O WHATSAPP ---
    const quoteForm = document.getElementById('quoteForm');

    quoteForm.addEventListener('submit', function(event) {
        event.preventDefault(); // Previne o envio padrão do formulário

        // ** IMPORTANTE: Substitua pelo seu número de WhatsApp **
        const numeroWhatsApp = '5561998221318'; // Use o formato: código do país + DDD + número

        // Coleta dos dados do formulário
        const nome = document.getElementById('nome').value;
        const empresa = document.getElementById('empresa').value || 'Não informado';
        const email = document.getElementById('email').value;
        const telefone = document.getElementById('telefone').value;
        const tipoServico = document.getElementById('tipoServico').value;
        const mensagemAdicional = document.getElementById('mensagem').value || 'Nenhuma';

        // Coleta dos instrumentos selecionados (checkboxes)
        const instrumentosSelecionados = [];
        const checkboxes = document.querySelectorAll('input[name="instrumentos"]:checked');
        checkboxes.forEach(checkbox => {
            instrumentosSelecionados.push(checkbox.value);
        });
        const instrumentosTexto = instrumentosSelecionados.length > 0 ? instrumentosSelecionados.join(', ') : 'Nenhum selecionado';

        // >>> CORREÇÃO: montar mensagem em texto puro e codificar com encodeURIComponent
        const linhas = [
            '*Nova Solicitação de Orçamento*',
            '',
            `*Nome:* ${nome}`,
            `*Empresa:* ${empresa}`,
            `*E-mail:* ${email}`,
            `*Telefone:* ${telefone}`,
            '',
            `*Tipo de Serviço:* ${tipoServico}`,
            instrumentosSelecionados.length > 0 ? `*Instrumentos:* ${instrumentosTexto}` : null,
            `*Mensagem Adicional:* ${mensagemAdicional}`
        ].filter(Boolean);

        const textoCodificado = encodeURIComponent(linhas.join('\n'));

        // >>> CORREÇÃO: usar endpoint api.whatsapp.com/send com phone + text
        const urlWhatsApp = `https://api.whatsapp.com/send?phone=${numeroWhatsApp}&text=${textoCodificado}`;
        window.open(urlWhatsApp, '_blank');
    });
});
</script>

<?php 
// Caminho do include corrigido para ser mais portável
include '../components/footer.php'; 
?>
