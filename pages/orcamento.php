<?php
// Arquivo: orcamento.php
// Caminho do include corrigido para ser mais portável
include '../components/header.php';

$serviceCategories = metrocal_get_service_categories();
$serviceOptions = metrocal_get_service_options_by_category();
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
                        <?php foreach ($serviceCategories as $category): ?>
                            <option value="<?php echo htmlspecialchars($category['title'], ENT_QUOTES, 'UTF-8'); ?>">
                                <?php echo htmlspecialchars($category['title'], ENT_QUOTES, 'UTF-8'); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group full-width" id="instrumentos-container">
                    <label>Selecione a(s) opção(ões) desejada(s)</label>
                    <div id="instrumentos-list" class="instrument-list"></div>
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
    const servicosEInstrumentos = <?php echo json_encode($serviceOptions, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); ?>;

    const servicoSelect = document.getElementById('tipoServico');
    const instrumentosContainer = document.getElementById('instrumentos-container');
    const instrumentosListDiv = document.getElementById('instrumentos-list');
    const quoteForm = document.getElementById('quoteForm');

    function slugify(value) {
        return value
            .normalize('NFD')
            .replace(/[\u0300-\u036f]/g, '')
            .toLowerCase()
            .replace(/[^a-z0-9]+/g, '-')
            .replace(/(^-|-$)/g, '');
    }

    servicoSelect.addEventListener('change', function() {
        const servicoSelecionado = this.value;
        const instrumentos = servicosEInstrumentos[servicoSelecionado];

        instrumentosListDiv.innerHTML = '';

        if (instrumentos && instrumentos.length > 0) {
            instrumentos.forEach((instrumento, index) => {
                const itemDiv = document.createElement('div');
                itemDiv.classList.add('instrument-item');

                const checkbox = document.createElement('input');
                checkbox.type = 'checkbox';
                checkbox.id = `opcao-${slugify(servicoSelecionado)}-${slugify(instrumento)}-${index}`;
                checkbox.name = 'instrumentos';
                checkbox.value = instrumento;

                const label = document.createElement('label');
                label.htmlFor = checkbox.id;
                label.textContent = instrumento;

                itemDiv.appendChild(checkbox);
                itemDiv.appendChild(label);
                instrumentosListDiv.appendChild(itemDiv);
            });

            instrumentosContainer.style.display = 'block';
        } else {
            instrumentosContainer.style.display = 'none';
        }
    });

    quoteForm.addEventListener('submit', function(event) {
        event.preventDefault();

        const numeroWhatsApp = '5561998221318';
        const nome = document.getElementById('nome').value;
        const empresa = document.getElementById('empresa').value || 'Não informado';
        const email = document.getElementById('email').value;
        const telefone = document.getElementById('telefone').value;
        const tipoServico = document.getElementById('tipoServico').value;
        const mensagemAdicional = document.getElementById('mensagem').value || 'Nenhuma';

        const instrumentosSelecionados = [];
        const checkboxes = document.querySelectorAll('input[name="instrumentos"]:checked');
        checkboxes.forEach(checkbox => {
            instrumentosSelecionados.push(checkbox.value);
        });

        const instrumentosTexto = instrumentosSelecionados.length > 0 ? instrumentosSelecionados.join(', ') : 'Nenhuma selecionada';
        const linhas = [
            '*Nova Solicitação de Orçamento*',
            '',
            `*Nome:* ${nome}`,
            `*Empresa:* ${empresa}`,
            `*E-mail:* ${email}`,
            `*Telefone:* ${telefone}`,
            '',
            `*Tipo de Serviço:* ${tipoServico}`,
            instrumentosSelecionados.length > 0 ? `*Opções desejadas:* ${instrumentosTexto}` : null,
            `*Mensagem Adicional:* ${mensagemAdicional}`
        ].filter(Boolean);

        const textoCodificado = encodeURIComponent(linhas.join('\n'));
        const urlWhatsApp = `https://api.whatsapp.com/send?phone=${numeroWhatsApp}&text=${textoCodificado}`;
        window.open(urlWhatsApp, '_blank');
    });
});
</script>

<?php
// Caminho do include corrigido para ser mais portável
include '../components/footer.php';
?>
