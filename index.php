<?php
// Arquivo: index.php
// Inclui o cabeçalho reutilizável. O header já inclui o config.php.
include 'components/header.php';
?>

    <section class="hero" id="hero-slider">
        <div class="slider-track">
            <div class="slide active"> <div class="hero-overlay"></div>
                <div class="container hero-container">
                    <div class="hero-content">
                        <h1 class="hero-title">Calibração e Metrologia de Alta Performance</h1>
                        <p class="hero-subtitle">Garantimos a conformidade e a eficiência do seu laboratório com certificados rápidos e rastreáveis</p>
                        <div class="hero-buttons">
                            <a href="<?php echo BASE_URL; ?>pages/orcamento.php" class="btn btn-primary">Solicitar Orçamento</a>
                            <a href="<?php echo BASE_URL; ?>pages/servicos.php" class="btn btn-secondary">Nossos Serviços</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="slide">
                <div class="hero-overlay"></div>
                <div class="container hero-container">
                    <div class="hero-content">
                        <h1 class="hero-title">Qualificação de Capela de Fluxo Laminar</h1>
                        <p class="hero-subtitle">Assegure um ambiente controlado e livre de contaminações com nossos serviços de qualificação e certificação.</p>
                        <div class="hero-buttons">
                            <a href="<?php echo BASE_URL; ?>pages/Qualificacao/qualificacao-capela-fluxo-laminar.php" class="btn btn-primary">Saiba Mais</a>
                            <a href="<?php echo BASE_URL; ?>pages/orcamento.php" class="btn btn-secondary">Solicitar Orçamento</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="slide">
                <div class="hero-overlay"></div>
                <div class="container hero-container">
                    <div class="hero-content">
                        <h1 class="hero-title">Qualificação Térmica de Autoclave</h1>
                        <p class="hero-subtitle">Garanta a eficácia dos seus processos de esterilização com certificados rastreáveis e conformidade total.</p>
                        <div class="hero-buttons">
                            <a href="<?php echo BASE_URL; ?>pages/Qualificacao/qualificacao-termica-autoclave.php" class="btn btn-primary">Saiba Mais</a>
                            <a href="<?php echo BASE_URL; ?>pages/orcamento.php" class="btn btn-secondary">Solicitar Orçamento</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> <button class="slider-nav prev" aria-label="Slide anterior">&#10094;</button>
        <button class="slider-nav next" aria-label="Próximo slide">&#10095;</button>
        <div class="slider-dots"></div>
    </section>

    <section class="sobre" id="sobre">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Sobre a Metrocal</h2>
                <div class="section-divider"></div>
            </div>
            
            <div class="sobre-content">
                <div class="sobre-text">
                    <p class="sobre-lead">
                        A Metrocal, uma empresa do Grupo Totallab, nasceu com a missão de revolucionar o mercado de serviços metrológicos. Entendemos que um laboratório não pode parar, e é por isso que combinamos expertise técnica com processos inovadores para oferecer um serviço de excelência, focado em agilidade e confiança.
                    </p>
                    <p>
                        Contamos com um laboratório de calibração e aferição highly equipado, preparado para atender às mais rigorosas demandas. Oferecemos serviços de Calibração Rastreável RBC para uma vasta gama de equipamentos, garantindo que cada procedimento siga os mais altos padrões de qualidade.
                    </p>
                    <div class="sobre-stats">
                        <div class="stat-item">
                            <span class="stat-number">10+</span>
                            <span class="stat-label">Anos de Experiência</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">500+</span>
                            <span class="stat-label">Clientes Atendidos</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">100%</span>
                            <span class="stat-label">Qualidade Garantida</span>
                        </div>
                    </div>
                </div>
                    <div class="sobre-image">
                        <img src="<?php echo BASE_URL; ?>img/sobre-foto.png" alt="Equipe Metrocal em laboratório" class="sobre-img">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="servicos" id="servicos">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Nossos Diferenciais</h2>
                <div class="section-divider"></div>
                <p class="section-description">Serviços especializados para assegurar a exatidão e a confiabilidade dos seus resultados.</p>
            </div>
            
            <div class="servicos-grid">
                <div class="servico-card">
                    <div class="servico-icon">📏</div>
                    <h3 class="servico-title">Calibração de Instrumentos</h3>
                    <p class="servico-description">
                        Garantimos a precisão e a confiabilidade dos seus equipamentos, assegurando que seus resultados estejam sempre em conformidade com os mais altos padrões.
                    </p>
                </div>

                <div class="servico-card">
                    <div class="servico-icon">✅</div>
                    <h3 class="servico-title">Qualificação de Instrumentos</h3>
                    <p class="servico-description">
                        Validamos a performance e a operação dos seus equipamentos, garantindo que funcionem de acordo com as especificações e normas regulatórias exigidas.
                    </p>
                </div>
                
                <div class="servico-card">
                    <div class="servico-icon">📜</div>
                    <h3 class="servico-title">Certificados RBC</h3>
                    <p class="servico-description">
                        Emitimos certificados com rastreabilidade RBC, oferecendo a validade e a credibilidade necessárias para suas auditorias e processos de qualidade em todo o país.
                    </p>
                </div>
                
                <div class="servico-card">
                    <div class="servico-icon">🛡️</div>
                    <h3 class="servico-title">Manutenção Preventiva</h3>
                    <p class="servico-description">
                        Evite paradas inesperadas e custos elevados. Nossos planos de manutenção garantem a longevidade e o desempenho máximo dos seus equipamentos.
                    </p>
                </div>
                
                <div class="servico-card">
                    <div class="servico-icon">👨‍🏫</div>
                    <h3 class="servico-title">Consultoria Técnica</h3>
                    <p class="servico-description">
                        Nossa expertise à sua disposição. Auxiliamos sua equipe a otimizar processos e a implementar um sistema de gestão da qualidade robusto e eficiente.
                    </p>
                </div>
                
                <div class="servico-card">
                    <div class="servico-icon">🔧</div>
                    <h3 class="servico-title">Manutenção Corretiva</h3>
                    <p class="servico-description">
                        Seu equipamento falhou? Nossa equipe técnica resolve. Oferecemos diagnóstico rápido e reparos precisos para restaurar sua operação e conformidade.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="diferenciais" id="diferenciais">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Por que escolher a Metrocal?</h2>
                <div class="section-divider"></div>
            </div>
            
            <div class="diferenciais-grid">
                <div class="diferencial-item">
                    <div class="diferencial-number">01</div>
                    <h3>Agilidade Garantida</h3>
                    <p> Calibração em até 5 dias. Seu certificado online disponível em 48 horas.</p>
                </div>
                
                <div class="diferencial-item">
                    <div class="diferencial-number">02</div>
                    <h3>Confiança Comprovada</h3>
                    <p>Rastreabilidade RBC. A garantia de conformidade e precisão que você precisa.</p>
                </div>
                
                <div class="diferencial-item">
                    <div class="diferencial-number">03</div>
                    <h3>Expertise Técnica</h3>
                    <p>Anos de experiência prática. Soluções eficientes para os seus desafios.</p>
                </div>
                
                <div class="diferencial-item">
                    <div class="diferencial-number">04</div>
                    <h3>Suporte Estratégico</h3>
                    <p>Mais que um serviço, uma parceria. Suporte proativo para sua tranquilidade.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="clientes" id="clientes">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Quem Confia na Metrocal</h2>
                <div class="section-divider"></div>
                <p class="section-description">Empresas líderes que não abrem mão da máxima precisão e conformidade. Seja o próximo caso de sucesso.</p>
            </div>
            
            <div class="clientes-grid">
                <div class="cliente-logo">
                    <img src="<?php echo BASE_URL; ?>img/clientes/bobs.png" alt="Logo da Empresa A">
                </div>
                <div class="cliente-logo">
                    <img src="<?php echo BASE_URL; ?>img/clientes/cocobambu.png" alt="Logo da Empresa B">
                </div>
                <div class="cliente-logo">
                    <img src="<?php echo BASE_URL; ?>img/clientes/dasa.png" alt="Logo da Empresa C">
                </div>
                <div class="cliente-logo">
                    <img src="<?php echo BASE_URL; ?>img/clientes/dbdiagnosticos.jpg" alt="Logo da Empresa D">
                </div>
                <div class="cliente-logo">
                    <img src="<?php echo BASE_URL; ?>img/clientes/exame.png" alt="Logo da Empresa E">
                </div>
                <div class="cliente-logo">
                    <img src="<?php echo BASE_URL; ?>img/clientes/giraffas.png" alt="Logo da Empresa F">
                </div>
                <div class="cliente-logo">
                    <img src="<?php echo BASE_URL; ?>img/clientes/grifols.png" alt="Logo da Empresa F">
                </div>
                <div class="cliente-logo">
                    <img src="<?php echo BASE_URL; ?>img/clientes/mcdonalds.png" alt="Logo da Empresa F">
                </div>
                <div class="cliente-logo">
                    <img src="<?php echo BASE_URL; ?>img/clientes/Micra.png" alt="Logo da Empresa F">
                </div>
                <div class="cliente-logo">
                    <img src="<?php echo BASE_URL; ?>img/clientes/nucleo.png" alt="Logo da Empresa F">
                </div>
                <div class="cliente-logo">
                    <img src="<?php echo BASE_URL; ?>img/clientes/sabin.png" alt="Logo da Empresa F">
                </div>
                <div class="cliente-logo">
                    <img src="<?php echo BASE_URL; ?>img/clientes/spoleto.png" alt="Logo da Empresa F">
                </div>
                <div class="cliente-logo">
                    <img src="<?php echo BASE_URL; ?>img/clientes/subway.png" alt="Logo da Empresa F">
                </div>
                <div class="cliente-logo">
                    <img src="<?php echo BASE_URL; ?>img/clientes/taikan.png" alt="Logo da Empresa F">
                </div>
            </div>
        </div>
    </section>

    <section class="home-cta" id="cta">
        <div class="container">
            <h2 class="home-cta-title">Pronto para Garantir sua Precisão?</h2>
            <p class="home-cta-subtitle">
                Fale com nossos especialistas e solicite uma proposta personalizada sem compromisso. Nossa equipe está pronta para entender suas necessidades.
            </p>
            <a href="<?php echo BASE_URL; ?>pages/orcamento.php" class="btn btn-primary">Solicitar Orçamento Online</a>
            <div class="home-cta-contact">
                <p>Ou ligue para nós: (61) 99822-1318</p>
            </div>
        </div>
    </section>

<?php
// Inclui o rodapé reutilizável
include 'components/footer.php';
?>