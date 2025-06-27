// ===================== CARROSSEL DE LIVROS ===================== //

const next = document.querySelector('.botaonext');
const prev = document.querySelector('.botaoprev');
const livros = document.querySelectorAll('.livro');
const container = document.querySelector('.barra-de-livros');

let currentIndex = 0;

// Configuração inicial
updateButtons();

// Eventos de clique nos botões do carrossel de livros
next.addEventListener('click', function(e) {
    e.preventDefault();
    if (currentIndex < livros.length - 5) {
        currentIndex++;
        smoothScrollToLivro();
    }
    updateButtons();
});

prev.addEventListener('click', function(e) {
    e.preventDefault();
    if (currentIndex > 0) {
        currentIndex--;
        smoothScrollToLivro();
    }
    updateButtons();
});

// Função de rolagem suave para o livro atual
function smoothScrollToLivro() {
    const livro = livros[currentIndex];
    const startLeft = container.scrollLeft;
    const targetLeft = livro.offsetLeft - container.offsetLeft;
    const distance = targetLeft - startLeft;
    const duration = 500; // 0.5 segundos
    let startTime = null;

    function animation(currentTime) {
        if (!startTime) startTime = currentTime;
        const elapsed = currentTime - startTime;
        const progress = Math.min(elapsed / duration, 1);
        
        container.scrollLeft = startLeft + (distance * progress);
        
        if (progress < 1) {
            requestAnimationFrame(animation);
        }
    }
    
    requestAnimationFrame(animation);
}

// Atualiza a visibilidade dos botões
function updateButtons() {
    prev.style.visibility = currentIndex === 0 ? 'hidden' : 'visible';
    next.style.visibility = currentIndex === livros.length - 5 ? 'hidden' : 'visible';
}


// ===================== SLIDES ===================== //

const slides = document.querySelector('.slides');
const slide = document.querySelectorAll('.slide');
const nextslide = document.querySelector('#botaonextslide');
const prevslide = document.querySelector('#botaoprevslide');

let quanti = slide.length;
let slideIndex = 0;
let quant = quanti - 1;
console.log(quant)

// Evento para avançar ou retroceder slide (ajustar lógica se necessário)

nextslide.addEventListener('click', function(e){
    e.preventDefault();

    if (slideIndex >= quant ) {
        slideIndex = 0;
    } else {
        slideIndex++;
    }

    smoothScrollToSlide();
});

prevslide.addEventListener('click', function(e){
    e.preventDefault();

    if (slideIndex <= 0) {
        slideIndex = quant;
        smoothScrollToSlide();
    } else {
        slideIndex--;
    }

    smoothScrollToSlide();
})

//muda de slide
function smoothScrollToSlide() {
    let active = document.querySelector('.active');
    active.classList.remove('active');
    slide[slideIndex].classList.add('active')
}




