// ==================== INICIALIZAÇÃO GERAL ====================
// Adicionamos um listener principal que espera a página carregar completamente.
// Todas as funções que precisam manipular o HTML serão chamadas a partir daqui.
document.addEventListener('DOMContentLoaded', function() {
    
    // Inicia todas as funcionalidades do site
    initMobileMenu();
    initHeaderScroll();
    initScrollAnimations();
    initScrollTopButton();
    initHeroSlider(); // <--- Adicionamos a chamada para iniciar o slider aqui
    initSmoothScroll();
    initNumberCounter();
    initPhoneMask();

    // O código de validação do formulário de contato só é relevante na página de contato,
    // então verificamos se o formulário existe antes de adicionar os listeners.
    const contactForm = document.getElementById('contatoForm');
    if (contactForm) {
        initContactFormValidation(contactForm);
    }
    
    console.log('%c🚀 Site Metrocal carregado com sucesso!', 'color: #0066CC; font-size: 16px; font-weight: bold;');
    console.log('%c✅ Todas as funcionalidades JavaScript estão ativas', 'color: #28a745; font-size: 14px;');
});


// ==================== HERO SLIDER ====================
function initHeroSlider() {
    const sliderContainer = document.getElementById('hero-slider');
    if (!sliderContainer) return;

    const track = sliderContainer.querySelector('.slider-track');
    const slides = Array.from(track.children);
    const prevBtn = sliderContainer.querySelector('.prev');
    const nextBtn = sliderContainer.querySelector('.next');
    const dotsContainer = sliderContainer.querySelector('.slider-dots');
    
    if (slides.length <= 1) {
        if(prevBtn) prevBtn.style.display = 'none';
        if(nextBtn) nextBtn.style.display = 'none';
        if(dotsContainer) dotsContainer.style.display = 'none';
        return;
    }

    let currentSlide = 0;
    const autoSlideInterval = 7000;
    let slideTimer;

    // Função para mover a "pista" para o slide correto
    function moveToSlide(targetIndex) {
        // CORREÇÃO PRINCIPAL: Usamos 'vw' (viewport width) em vez de '%'
        // Isso move a pista em múltiplos da largura da tela.
        track.style.transform = 'translateX(-' + targetIndex * 100 + 'vw)';
        
        // Atualiza a classe 'active' no slide
        slides.forEach(slide => slide.classList.remove('active'));
        slides[targetIndex].classList.add('active');

        // Atualiza os dots
        const dots = dotsContainer.querySelectorAll('.dot');
        dots.forEach(dot => dot.classList.remove('active'));
        if (dots[targetIndex]) {
            dots[targetIndex].classList.add('active');
        }

        currentSlide = targetIndex;
    }

    function nextSlide() {
        let nextIndex = currentSlide + 1;
        if (nextIndex >= slides.length) {
            nextIndex = 0;
        }
        moveToSlide(nextIndex);
    }
    
    function prevSlide() {
        let prevIndex = currentSlide - 1;
        if (prevIndex < 0) {
            prevIndex = slides.length - 1;
        }
        moveToSlide(prevIndex);
    }
    
    function resetTimer() {
        clearInterval(slideTimer);
        slideTimer = setInterval(nextSlide, autoSlideInterval);
    }

    // Criar os dots
    slides.forEach((_, index) => {
        const dot = document.createElement('button');
        dot.classList.add('dot');
        dot.setAttribute('aria-label', `Ir para o slide ${index + 1}`);
        dot.addEventListener('click', () => {
            moveToSlide(index);
            resetTimer();
        });
        dotsContainer.appendChild(dot);
    });

    nextBtn.addEventListener('click', () => {
        nextSlide();
        resetTimer();
    });

    prevBtn.addEventListener('click', () => {
        prevSlide();
        resetTimer();
    });

    // Inicia o slider
    moveToSlide(0);
    resetTimer();
}


// ==================== MENU HAMBURGUER MOBILE ====================
function initMobileMenu() {
    const hamburger = document.getElementById('hamburger');
    const navMenu = document.getElementById('navMenu');
    const navLinks = document.querySelectorAll('.nav-link');

    if (!hamburger || !navMenu) return;

    hamburger.addEventListener('click', () => {
        hamburger.classList.toggle('active');
        navMenu.classList.toggle('active');
    });

    navLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            const parent = link.closest('.menu-item-has-mega');
            if (parent && window.innerWidth <= 768) {
                e.preventDefault();
                parent.classList.toggle('active');
            } else {
                hamburger.classList.remove('active');
                navMenu.classList.remove('active');
            }
        });
    });

    const megaMenuLinks = document.querySelectorAll('.mega-menu-list a');
    megaMenuLinks.forEach(link => {
        link.addEventListener('click', () => {
            if (window.innerWidth <= 768) {
                hamburger.classList.remove('active');
                navMenu.classList.remove('active');
                const megaMenuItem = document.querySelector('.menu-item-has-mega');
                if (megaMenuItem) {
                    megaMenuItem.classList.remove('active');
                }
            }
        });
    });
}


// ==================== HEADER COM SCROLL ====================
function initHeaderScroll() {
    const header = document.getElementById('header');
    if (!header) return;

    window.addEventListener('scroll', () => {
        if (window.pageYOffset > 50) {
            header.style.boxShadow = '0 5px 20px rgba(0, 0, 0, 0.1)';
        } else {
            header.style.boxShadow = '0 2px 10px rgba(0, 0, 0, 0.1)';
        }
    });
}


// ==================== ANIMAÇÃO DE FADE IN AO ROLAR ====================
function initScrollAnimations() {
    const animateElements = document.querySelectorAll('.servico-card, .diferencial-item, .info-item, .sobre-text, .sobre-image');
    if (animateElements.length === 0) return;

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });

    animateElements.forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(30px)';
        el.style.transition = 'opacity 0.6s ease-out, transform 0.6s ease-out';
        observer.observe(el);
    });
}


// ==================== BOTÃO VOLTAR AO TOPO ====================
function initScrollTopButton() {
    const scrollTopBtn = document.getElementById('scrollTop');
    if (!scrollTopBtn) return;

    window.addEventListener('scroll', () => {
        if (window.pageYOffset > 300) {
            scrollTopBtn.classList.add('show');
        } else {
            scrollTopBtn.classList.remove('show');
        }
    });

    scrollTopBtn.addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
}


// ==================== VALIDAÇÃO E ENVIO DO FORMULÁRIO DE CONTATO ====================
function initContactFormValidation(form) {
    const formMessage = document.getElementById('formMessage');

    form.addEventListener('submit', (e) => {
        e.preventDefault();
        
        const nome = document.getElementById('nome').value.trim();
        const email = document.getElementById('email').value.trim();
        const telefone = document.getElementById('telefone').value.trim();
        const assunto = document.getElementById('assunto').value.trim();
        const mensagem = document.getElementById('mensagem').value.trim();
        
        if (!validarFormulario(nome, email, telefone, assunto, mensagem, formMessage)) {
            return;
        }
        
        enviarFormulario(form, formMessage);
    });
}

function validarFormulario(nome, email, telefone, assunto, mensagem, formMessage) {
    if (nome.length < 3) {
        mostrarMensagem('Por favor, insira seu nome completo.', 'error', formMessage);
        return false;
    }
    const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!regexEmail.test(email)) {
        mostrarMensagem('Por favor, insira um e-mail válido.', 'error', formMessage);
        return false;
    }
    if (telefone.length < 10) {
        mostrarMensagem('Por favor, insira um telefone válido.', 'error', formMessage);
        return false;
    }
    if (assunto.length < 3) {
        mostrarMensagem('Por favor, insira um assunto válido.', 'error', formMessage);
        return false;
    }
    if (mensagem.length < 10) {
        mostrarMensagem('Por favor, insira uma mensagem com pelo menos 10 caracteres.', 'error', formMessage);
        return false;
    }
    return true;
}

function enviarFormulario(form, formMessage) {
    // Simulação de sucesso. Em um projeto real, aqui iria o código de envio para o backend.
    mostrarMensagem('Mensagem enviada com sucesso! Entraremos em contato em breve.', 'success', formMessage);
    form.reset();
}

function mostrarMensagem(texto, tipo, formMessage) {
    formMessage.textContent = texto;
    formMessage.className = `form-message ${tipo}`;
    
    setTimeout(() => {
        formMessage.style.display = 'none';
        formMessage.className = 'form-message';
    }, 5000);
}


// ==================== SMOOTH SCROLL PARA LINKS INTERNOS ====================
function initSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            
            if (target) {
                const headerOffset = 80;
                const elementPosition = target.getBoundingClientRect().top;
                const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

                window.scrollTo({ top: offsetPosition, behavior: 'smooth' });
            }
        });
    });
}


// ==================== ANIMAÇÃO DE NÚMEROS (CONTADOR) ====================
function initNumberCounter() {
    const statNumbers = document.querySelectorAll('.stat-number');
    if (statNumbers.length === 0) return;
    
    let animated = false;

    const animateNumbers = () => {
        if (animated) return;
        
        const aboutSection = document.querySelector('.sobre');
        if (!aboutSection) return;

        const aboutPosition = aboutSection.getBoundingClientRect().top;
        const screenPosition = window.innerHeight / 1.3;
        
        if (aboutPosition < screenPosition) {
            animated = true;
            statNumbers.forEach(stat => {
                const target = parseInt(stat.textContent.replace(/\D/g, ''));
                const symbol = stat.textContent.replace(/[0-9]/g, '');
                let current = 0;
                const increment = target / 100;

                const updateNumber = () => {
                    current += increment;
                    if (current < target) {
                        stat.textContent = Math.ceil(current) + symbol;
                        requestAnimationFrame(updateNumber);
                    } else {
                        stat.textContent = target + symbol;
                    }
                };
                updateNumber();
            });
        }
    };
    window.addEventListener('scroll', animateNumbers);
}


// ==================== MASK PARA TELEFONE ====================
function initPhoneMask() {
    const telefoneInput = document.getElementById('telefone');
    if (!telefoneInput) return;

    telefoneInput.addEventListener('input', (e) => {
        let value = e.target.value.replace(/\D/g, '');
        if (value.length > 11) value = value.substring(0, 11);

        if (value.length > 10) {
            value = value.replace(/^(\d{2})(\d{5})(\d{4}).*/, '($1) $2-$3');
        } else if (value.length > 6) {
            value = value.replace(/^(\d{2})(\d{4})(\d{0,4}).*/, '($1) $2-$3');
        } else if (value.length > 2) {
            value = value.replace(/^(\d{2})(\d*)/, '($1) $2');
        } else {
            value = value.replace(/^(\d*)/, '($1');
        }
        e.target.value = value;
    });
}