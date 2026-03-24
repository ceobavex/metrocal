<?php
// Arquivo: footer.php
?>
    <footer class="footer">
        <div class="container">
            <div class="footer-main">
                <div class="footer-brand">
                    <h3 class="footer-title">METROCAL</h3>
                    <p class="footer-text">
                        Soluções em calibração e metrologia com qualidade, agilidade e profissionalismo.
                    </p>
                    <div class="footer-social-icons" aria-hidden="true">
                        <span class="footer-social-icon"><i class="fa-brands fa-facebook-f"></i></span>
                        <span class="footer-social-icon"><i class="fa-brands fa-instagram"></i></span>
                        <span class="footer-social-icon"><i class="fa-brands fa-linkedin-in"></i></span>
                    </div>
                </div>

                <div class="footer-nav">
                    <div class="footer-col">
                        <h4 class="footer-subtitle">Navegação</h4>
                        <ul class="footer-links">
                            <li><a href="<?php echo BASE_URL; ?>index.php">Início</a></li>
                            <li><a href="<?php echo BASE_URL; ?>pages/sobre.php">Sobre</a></li>
                            <li><a href="<?php echo BASE_URL; ?>pages/servicos.php">Serviços</a></li>
                            <li><a href="<?php echo BASE_URL; ?>pages/orcamento.php">Orçamento</a></li>
                            <li><a href="<?php echo BASE_URL; ?>pages/escopos.php">Escopos</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4 class="footer-subtitle">Contato</h4>
                        <ul class="footer-contact-list">
                            <li>
                                <i class="fa-solid fa-location-dot"></i>
                                <span>Quadra 6 Conjunto 2 Lote 11 Loja 5<br>Vicente Pires - Brasília/DF</span>
                            </li>
                            <li>
                                <i class="fa-solid fa-phone"></i>
                                <a href="tel:+5561998221318">(61) 99822-1318 | (61) 99942-1217</a>
                            </li>
                            <li>
                                <i class="fa-solid fa-envelope"></i>
                                <a href="mailto:comercial@totallab.com.br">totallab@totallab.com.br</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; <?php echo date("Y"); ?> Metrocal - Grupo Totallab. Todos os direitos reservados.</p>
            </div>
        </div>
    </footer>

    <button class="scroll-top" id="scrollTop" aria-label="Voltar ao topo">↑</button>
    <a href="https://wa.me/5561998221318?text=Ol%C3%A1!%20Gostaria%20de%20solicitar%20um%20or%C3%A7amento." class="whatsapp-float" target="_blank" rel="noopener noreferrer" aria-label="Fale conosco pelo WhatsApp">
        <i class="fa-brands fa-whatsapp"></i>
    </a>

    <script src="<?php echo BASE_URL; ?>js/script.js"></script>
</body>
</html>
