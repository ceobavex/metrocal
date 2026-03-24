<?php
// Arquivo: escopos.php
// Caminho do include corrigido para ser mais portável
include '../components/header.php'; 
?>

<style>
    .page-header-service {
        padding: 120px 0 60px 0;
        background: linear-gradient(45deg, var(--azul-escuro), var(--azul-principal));
        text-align: center;
        color: var(--branco);
    }
    .page-header-service h1 {
        font-size: 2.8rem;
        font-weight: 700;
    }
    .scopes-wrapper {
        padding: 60px 0;
    }
    .search-container {
        max-width: 850px;
        margin: 0 auto 40px auto;
    }
    .search-container input {
        width: 100%;
        padding: 15px 20px;
        font-size: 1.1rem;
        border: 2px solid #E0E0E0;
        border-radius: 30px;
        font-family: 'Poppins', sans-serif;
    }
    .search-container input:focus {
        outline: none;
        border-color: var(--azul-principal);
        box-shadow: 0 0 0 4px rgba(0, 102, 204, 0.1);
    }
    .category-block {
        max-width: 850px;
        margin: 0 auto 40px auto;
    }
    .category-title {
        font-size: 2rem;
        color: var(--azul-escuro);
        border-bottom: 3px solid var(--azul-principal);
        padding-bottom: 10px;
        margin-bottom: 20px;
    }
    .instrument-list {
        list-style: none;
        padding-left: 0;
        column-count: 2; /* Divide a lista em 2 colunas */
        column-gap: 40px;
    }
    .instrument-list li {
        margin-bottom: 12px;
        font-size: 1rem;
        color: #555;
        break-inside: avoid-column; /* Evita que um item quebre entre colunas */
    }
    #no-results-message {
        text-align: center;
        font-size: 1.2rem;
        color: #888;
        padding: 40px 0;
        display: none; /* Começa escondido */
    }
    @media (max-width: 768px) {
        .instrument-list {
            column-count: 1; /* Uma coluna em telas menores */
        }
    }
</style>

<main>
    <section class="page-header-service">
        <div class="container">
            <h1>Nossos Escopos de Calibração</h1>
        </div>
    </section>

    <section class="scopes-wrapper">
        <div class="container">

            <div class="search-container">
                <input type="text" id="instrumento-search" placeholder="🔎 Digite o nome do instrumento para pesquisar...">
            </div>

            <div id="no-results-message">
                <p>Nenhum instrumento encontrado.</p>
            </div>

            <div class="category-block">
                <h2 class="category-title">Dimensional</h2>
                <ul class="instrument-list">
                    <li>Anemômetro até 20 m</li>
                    <li>Arame para Medição de Rosca</li>
                    <li>Bloco em “V” até 300 mm</li>
                    <li>Bloco Padrão até 100 mm</li>
                    <li>Bloco Paralelo até 100 mm</li>
                    <li>Barra Padrão</li>
                    <li>Cabeçote Micrométrico</li>
                    <li>Calibrador Anel Roscado Cilíndrico até 150 mm</li>
                    <li>Calibrador Anel Liso até 200 mm</li>
                    <li>Calibrador de Boca até 200 mm</li>
                    <li>Calibrador de Relógio até 50 mm</li>
                    <li>Calibrador Tampão Roscado Cilíndrico até 150 mm</li>
                    <li>Calibrador Tampão Roscado Cônico até 150 mm</li>
                    <li>Calibrador Tampão Liso até 200 mm</li>
                    <li>Calibrador Tampão Liso Cônico até 150 mm</li>
                    <li>Calibre de Solda até 90º / 100 mm</li>
                    <li>Calibre de Ferradura</li>
                    <li>Calibre de Folga até 10 mm</li>
                    <li>Calibre de Raio até 100 mm</li>
                    <li>Calibre de Rosca passo de 10 mm</li>
                    <li>Calha Parshal</li>
                    <li>Comparador Eletrônico</li>
                    <li>Cantoneira até 750 mm</li>
                    <li>Cintel até 1500 mm</li>
                    <li>Clinômetro até 90º</li>
                    <li>Comparador de Diâmetro Interno</li>
                    <li>Conta-Metros até 100.000 m</li>
                    <li>Desempeno até 3m</li>
                    <li>Dispositivo</li>
                    <li>Durômetro Shore 100 shore “A”, “C” e “D”</li>
                    <li>Entre Pontas até 300 mm</li>
                    <li>Escantilhão até 90º</li>
                    <li>Esquadro de Aço até 500 mm</li>
                    <li>Esquadro Cilíndrico até 500 mm</li>
                    <li>Esquadro de Granito até 500 mm</li>
                    <li>Esquadro Combinado até 1000 mm</li>
                    <li>Fita Perimétrica até 100 m</li>
                    <li>Lupa</li>
                    <li>Lâmina Padrão</li>
                    <li>Haste Padrão até 900 mm</li>
                    <li>Máquina de Medição</li>
                    <li>Máquina de Medir Longitudes</li>
                    <li>Medidor de Altura até 1500 mm</li>
                    <li>Medidor de Camadas de Tinta até 2 mm</li>
                    <li>Medidor de Espessura (Ultra-Som) até 5 mm</li>
                    <li>Mesa de Seno até 400 mm</li>
                    <li>Micrômetro Externo até 1000 mm</li>
                    <li>Micrômetro para Adaptação até 1000 mm</li>
                    <li>Micrômetro com Batentes Intercambiáveis até 1000 mm</li>
                    <li>Micrômetro Interno de 2 pontas até 1500 mm</li>
                    <li>Micrômetro Interno de 3 pontas de 4 até 175 mm</li>
                    <li>Micrômetro Interno Tubular até 1500 mm</li>
                    <li>Micrômetro de Profundidade até 300 mm</li>
                    <li>Microscópio</li>
                    <li>Nível de Bolha</li>
                    <li>Nível de Precisão Linear / Quadrangular</li>
                    <li>Nível Óptico / Teodolito</li>
                    <li>Paquímetro até 1500 mm</li>
                    <li>Paquímetro de Profundidade</li>
                    <li>Padrão Escalonado até 600 mm</li>
                    <li>Padrão Escalonado com Fuso Micrométrico até 300 mm</li>
                    <li>Padrão Escalonado para Micrômetro</li>
                    <li>Padrão Escalonado para Micrômetro Interno de 2 pontas</li>
                    <li>Padrão Escalonado para Máquina de Medição de Coordenadas</li>
                    <li>Padrão Escalonado com Tambor Micrométrico</li>
                    <li>Paralelo Ótico</li>
                    <li>Peneira Granulométrica Mínimo Malha ABNT 325</li>
                    <li>Penetrômetro até 100 mm</li>
                    <li>Pino Calibrado até 200 mm</li>
                    <li>Prisma até 300 mm</li>
                    <li>Prisma Magnético até 300 mm</li>
                    <li>Projetor de Perfil até 300 mm</li>
                    <li>Régua Graduada até 3 m</li>
                    <li>Régua com Fio até 400 mm</li>
                    <li>Régua de Seno até 300 mm</li>
                    <li>Régua Paralela até 800 mm</li>
                    <li>Relógio Comparador até 50 mm</li>
                    <li>Relógio Apalpador até 10 mm</li>
                    <li>Súbito até 400 mm</li>
                    <li>Tambor Micrométrico</li>
                    <li>Transferidor de Graus (360º)</li>
                    <li>Trena até 100 m</li>
                    <li>Tridimensional</li>
                </ul>
            </div>

            <div class="category-block">
                <h2 class="category-title">Eletricidade, Tempo e Frequência</h2>
                <ul class="instrument-list">
                    <li>Alicate Amperimétrico até 800 A</li>
                    <li>Amperímetro de Painel até 500 A</li>
                    <li>Agitador até 24 horas</li>
                    <li>Analisador de Sinal até 250 MHz</li>
                    <li>Calibrador Digital até 1000 V, 10 A, 500 GΩ</li>
                    <li>Capacímetro até 3 µF</li>
                    <li>Calibrador Cappo até 1000 V, 10 A, 500 GΩ</li>
                    <li>Contador de Pulso até 250 MHz</li>
                    <li>Cronômetro até 24 horas</li>
                    <li>Estroboscópio 90.000 rpm</li>
                    <li>Década de Resistência de 0,01 Ω a 12 MΩ</li>
                    <li>Frequencímetro até 300 MHz</li>
                    <li>Fonte CC/CA até 1000 V / 10 A</li>
                    <li>Fonte Padrão até 1000 V</li>
                    <li>Gerador de Funções até 220 MHz</li>
                    <li>Gerador de Frequência até 220 MHz</li>
                    <li>Holiday Detector até 35000 V</li>
                    <li>Hipot Tester 40 kV</li>
                    <li>Mala Potenciométrica até 3000 W</li>
                    <li>Mala Wallace e Tiernan</li>
                    <li>Medidor de RMS até 1000 V</li>
                    <li>Micro-Ohmímetro até 100 Ω</li>
                    <li>Mili-Voltímetro até 1000 V</li>
                    <li>Megôhmetro até 2 GΩ</li>
                    <li>Multímetro Analógico até 1000 V, 10 A, 500 GΩ</li>
                    <li>Multímetro Digital até 6 ½ Dígitos</li>
                    <li>Osciloscópio até 500 MHz</li>
                    <li>Ponte de Kelvin de 0,01 Ω até 12 MΩ</li>
                    <li>Ponte de RCL 500 GΩ, 3 µF</li>
                    <li>Ponte de Wheatstone de 0,01 Ω até 12 MΩ</li>
                    <li>Shunt 10000 A</li>
                    <li>Rugosímetro até 30 µm</li>
                    <li>Tacômetro até 99000 rpm</li>
                    <li>Terrômetro até 2 GΩ</li>
                    <li>Voltímetro Analógico e Digital até 1000 V</li>
                    <li>Wattímetro Monofásico e Trifásico até 3000 W</li>
                </ul>
            </div>

            <div class="category-block">
                <h2 class="category-title">Pressão</h2>
                <ul class="instrument-list">
                    <li>Autoclave</li>
                    <li>Bomba de Peso Morto até 600 MPa</li>
                    <li>Calibrador de Pneus até 280 libras</li>
                    <li>Calibrador de Pressão Digital até 600 kgf/cm²</li>
                    <li>Calibrador Digital Pneumático 700 kgf/cm²</li>
                    <li>Coluna Inclinada 20 bar</li>
                    <li>Coluna Manométrica 20 bar</li>
                    <li>Coluna de H2O e Mercúrio até 20 bar</li>
                    <li>Mano-Vacuômetro 630 mmHg / 700 kgf/cm²</li>
                    <li>Mano-Vacuômetro Digital</li>
                    <li>Manômetro de Coluna H20 até 20 bar</li>
                    <li>Manômetro 0,5 % de 0 a 700 kgf/cm²</li>
                    <li>Manômetro 1% de 0 a 700 kgf/cm²</li>
                    <li>Manômetro 2% a 5% de 0 a 700 kgf/cm²</li>
                    <li>Manômetro de Coluna Hg até 20 bar</li>
                    <li>Manômetro Digital</li>
                    <li>Pressostato até 700 kgf/cm²</li>
                    <li>Transdutor de Pressão</li>
                    <li>Transmissor de Pressão</li>
                    <li>Vacuômetro de 0 a -800 mmHg</li>
                    <li>Vacuômetro Digital</li>
                </ul>
            </div>

            <div class="category-block">
                <h2 class="category-title">Temperatura e Umidade</h2>
                <ul class="instrument-list">
                    <li>Banho de Imersão até 1000 ºC</li>
                    <li>Espada Higrométrica até 80 %</li>
                    <li>Estação Metereológica até 50 ºC</li>
                    <li>Forno e Mufla 1100 ºC</li>
                    <li>Freezer até -40 ºC</li>
                    <li>HDT-Vicat até 300 ºC</li>
                    <li>Higrômetro até 80 %</li>
                    <li>Indicador de Temperatura até 1100 ºC</li>
                    <li>Pirômetro e Controlador de Temperatura até 1100 ºC</li>
                    <li>Pirômetro Ótico até 1100 ºC</li>
                    <li>Ponto de Fusão até 1100 ºC</li>
                    <li>Psicrômetro até 80 % / 50 ºC</li>
                    <li>Registrador de Temperatura até 80 % / 50 ºC</li>
                    <li>Termohigrômetro até 80 % / 50 ºC</li>
                    <li>Termohigrógrafo até 80 % / 50 ºC</li>
                    <li>Termômetro Bimetálico até 600 ºC</li>
                    <li>Termômetro de Mercúrio até 600 ºC</li>
                    <li>Termômetro Digital até 1100 ºC</li>
                    <li>Termopar até 1100 ºC</li>
                    <li>Termostato até 1100 ºC</li>
                    <li>Termoresistência</li>
                </ul>
            </div>

            <div class="category-block">
                <h2 class="category-title">Volume e Viscosidade</h2>
                <ul class="instrument-list">
                    <li>Balão Volumétrico até 2000 ml</li>
                    <li>Bureta até 2000 ml</li>
                    <li>Condutivímetro</li>
                    <li>Cálice até 2000 ml</li>
                    <li>Copo Becker até 2000 ml</li>
                    <li>Densímetro acima de 1000 g/ml</li>
                    <li>Frasco Erlemeyer até 2000 ml</li>
                    <li>Grindômetro até 500 µm</li>
                    <li>pHmetro de 1 a 30 pH</li>
                    <li>Picnômetro até 1000 ml</li>
                    <li>Pipeta até 2000 ml</li>
                    <li>Proveta até 2000 ml</li>
                    <li>Refratômetro até 100 Brix</li>
                    <li>Sacarímetro até 100 Brix</li>
                    <li>Viscosímetro Padrão até 60.000</li>
                    <li>Viscosímetro Copo Din (Todos)</li>
                    <li>Viscosímetro Copo Ford (Todos)</li>
                    <li>Viscosímetro Copo Zahn (Todos)</li>
                    <li>Viscosímetro Cinemático até 100 ºC</li>
                    <li>Viscosímetro Saybolt (Todos)</li>
                </ul>
            </div>

            <div class="category-block">
                <h2 class="category-title">Força</h2>
                <ul class="instrument-list">
                    <li>Calibrador de Torquímetro até 3000 Nm</li>
                    <li>Célula de Carga até 10000 kg</li>
                    <li>Dinamômetro até 10000 kg</li>
                    <li>Máquina de Embutimento até 100 kgf/cm²</li>
                    <li>Máquina de Ensaios e Tração até 50 ton</li>
                    <li>Parafusadeira</li>
                    <li>Tensiômetro até 300 libras</li>
                    <li>Torquímetro até 3000 Nm</li>
                </ul>
            </div>

            <div class="category-block">
                <h2 class="category-title">Dureza, Massa e Ótica</h2>
                <ul class="instrument-list">
                    <li>Balança Analítica / Semi-Analítica</li>
                    <li>Balança Mecânica ou Digital até 5000 kg</li>
                    <li>Dinamômetro até 5000 kg</li>
                    <li>Durômetro HRC, HRB, HB</li>
                    <li>Esclerógrafo até 20 kg</li>
                    <li>Massa Padrão até 20 kg</li>
                    <li>Microscópio (Objetiva até 100x)</li>
                    <li>Micro-Durômetro ±700 HV / HV5 e HV10</li>
                </ul>
            </div>
        </div>
    </section>
</main>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('instrumento-search');
    const categoryBlocks = document.querySelectorAll('.category-block');
    const noResultsMessage = document.getElementById('no-results-message');

    searchInput.addEventListener('input', function () {
        const searchTerm = searchInput.value.toLowerCase().trim();
        let totalVisibleItems = 0;

        categoryBlocks.forEach(block => {
            const listItems = block.querySelectorAll('.instrument-list li');
            let visibleItemsInCategory = 0;

            listItems.forEach(item => {
                const itemText = item.textContent.toLowerCase();
                if (itemText.includes(searchTerm)) {
                    item.style.display = '';
                    visibleItemsInCategory++;
                } else {
                    item.style.display = 'none';
                }
            });

            // Mostra ou esconde o bloco da categoria
            if (visibleItemsInCategory > 0) {
                block.style.display = '';
                totalVisibleItems += visibleItemsInCategory;
            } else {
                block.style.display = 'none';
            }
        });

        // Mostra ou esconde a mensagem de "nenhum resultado"
        if (totalVisibleItems === 0 && searchTerm !== '') {
            noResultsMessage.style.display = 'block';
        } else {
            noResultsMessage.style.display = 'none';
        }
    });
});
</script>

<?php 
// Caminho do include corrigido para ser mais portável
include '../components/footer.php'; 
?>