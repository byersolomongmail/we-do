@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
    /* General Styling */
body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.landing-page {
    scroll-behavior: smooth;
}

/* Hero Section */
.hero-section {
    background: linear-gradient(to bottom, #007bff, #0056b3);
    color: white;
    padding: 100px 0;
    text-align: center;
}
.background {
    background: url('/images/background.jpg') center/cover no-repeat;
    color: white;
    padding: 120px 0;
    text-align: center;
    position: relative;
    overflow: hidden;
}

.background:after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}


.hero-title {
    font-size: 2.5rem;
    margin-bottom: 10px;
}

.hero-subtitle {
    font-size: 1.2rem;
    margin-bottom: 20px;
}

.btn-primary {
    background-color: #0056b3;
    color: white;
    padding: 10px 20px;
    font-size: 1rem;
    border: none;
    border-radius: 5px;
    transition: 0.3s;
}

.btn-primary:hover {
    background-color: #003f7f;
}

/* Features Section */
.features-section {
    background: #f8f9fa;
    padding: 60px 0;
}

.feature-card {
    animation: slide-in 1s ease-out;
}

.card {
    border: none;
    text-align: center;
    transition: 0.3s;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
}

.card:hover {
    transform: scale(1.05);
}

.card img {
    max-width: 80px;
    margin-bottom: 15px;
}

/* Testimonials Section */
.testimonials-section {
    background: white;
    padding: 60px 0;
}

.scrolling-cards {
    display: flex;
    gap: 15px;
    overflow-x: auto;
    padding: 10px;
}

.testimonial-card {
    min-width: 250px;
    border: 1px solid #ddd;
    padding: 15px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    background-color: #f9f9f9;
    text-align: center;
}

/* Call to Action Section */
.cta-section {
    background: #343a40;
    color: white;
    padding: 80px 0;
    text-align: center;
}

.cta-title {
    font-size: 2rem;
    margin-bottom: 15px;
}

.btn-success {
    background-color: #28a745;
    color: white;
    padding: 10px 20px;
    font-size: 1rem;
    border: none;
    border-radius: 5px;
    transition: 0.3s;
}

.btn-success:hover {
    background-color: #1e7e34;
}

/* Animations */
@keyframes slide-in {
    from {
        opacity: 0;
        transform: translateY(50px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
/* General Container Styling */



</style>

   
<div id="fillHere"></div>
<script>
var css=`
.full-page-image-container h1 {
    font-family: 'Arial', sans-serif;
    color: #ffdd57;
    text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
}

.full-page-image-container p {
    font-family: 'Arial', sans-serif;
    color: #ffffff;
    text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
}

.animated-container {
    position: relative;
    margin: 20px auto;
    max-width: 400px;
    text-align: center;
    opacity: 0;
    transform: translateY(20px);
    transition: opacity 0.5s ease, transform 0.5s ease;
}

.animated-container.animate {
    opacity: 1;
    transform: translateY(0);
}

.image-card img {
    width: 100%;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.text-card {
    padding: 10px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    margin-top: 10px;
    font-family: Arial, sans-serif;
}

/* Side-by-Side Layout */
.animated-container[style*="flex"] {
    align-items: center;
    justify-content: center;
    gap: 10px;
}
@media screen and (max-width: 768px) {
    .full-page-center-text {
        font-size: 1.5rem;
    }

    .full-page-left-text,
    .full-page-right-text {
        display:none;
        font-size: 1rem;
    }
}

/* Keyframes for Animations */
@keyframes slide-in {
    from {
        transform: translateX(-100%);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}

@keyframes fade-in {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

@keyframes zoom-in {
    from {
        transform: scale(0.8);
        opacity: 0;
    }
    to {
        transform: scale(1);
        opacity: 1;
    }
}

/* Animation Classes */
.slide-in {
    animation: slide-in 1s ease forwards;
}

.fade-in {
    animation: fade-in 1s ease forwards;
}

.zoom-in {
    animation: zoom-in 1s ease forwards;
}`;
head = document.head || document.getElementsByTagName('head')[0],
style = document.createElement('style');

head.appendChild(style);

style.type = 'text/css';
if (style.styleSheet){
  // This is required for IE8 and below.
  style.styleSheet.cssText = css;
} else {
  style.appendChild(document.createTextNode(css));
}
// Slide-in Animation
function createSlideInAnimation(imageUrl, text, selector = 'body', layout = 'under') {
    createAnimatedCard(imageUrl, text, selector, layout, 'slide-in');
}

// Fade-in Animation
function createFadeInAnimation(imageUrl, text, selector = 'body', layout = 'under') {
    createAnimatedCard(imageUrl, text, selector, layout, 'fade-in');
}

// Zoom-in Animation
function createZoomInAnimation(imageUrl, text, selector = 'body', layout = 'under') {
    createAnimatedCard(imageUrl, text, selector, layout, 'zoom-in');
}

// Core Function for Card Creation
function createAnimatedCard(imageUrl, content, selector, layout, animationClass) {
    const container = document.createElement('div');
    container.style.opacity = "0";
    const imageCard = document.createElement('div');
    imageCard.classList.add('image-card');
    const image = document.createElement('img');
    image.src = imageUrl;
    imageCard.appendChild(image);

    const textCard = document.createElement('div');
    textCard.classList.add('text-card');

    // Accept either text or HTML
    if (typeof content === 'string') {
        textCard.innerHTML = content; // Can handle both plain text and HTML
    } else if (content instanceof Node) {
        textCard.appendChild(content); // If content is a DOM element, append it
    }

    if (layout === 'side-by-side') {
        container.style.display = 'flex';
        container.appendChild(imageCard);
        container.appendChild(textCard);
    } else if (layout === 'side-by-side-reversed') {
        container.style.display = 'flex';
        container.appendChild(textCard);
        container.appendChild(imageCard);
    } else if (layout === 'on-top') {
        container.appendChild(textCard);
        container.appendChild(imageCard);
    } else {
        // Default: text under the image
        container.appendChild(imageCard);
        container.appendChild(textCard);
    }

    const target = document.querySelector(selector) || document.body;
    target.appendChild(container);

    onScrollIntoView(container, () => {
        container.style.opacity = "1";
        container.classList.add('animate');
        container.classList.add('animated-container', animationClass);
    });
}
function createTitleImageWithText(imageUrl, text, selector = 'body', animationClass = 'fade-in') {
    const container = document.createElement('div');
    container.classList.add('animated-container', animationClass);

    const titleImage = document.createElement('div');
    titleImage.style.position = 'relative';
    titleImage.style.width = '100%';
    titleImage.style.textAlign = 'center';
    titleImage.style.color = 'white';
    titleImage.style.fontFamily = 'Arial, sans-serif';
    titleImage.style.fontSize = '24px';
    titleImage.style.fontWeight = 'bold';
    titleImage.style.lineHeight = '1.2';
    titleImage.style.overflow = 'hidden';

    const image = document.createElement('img');
    image.src = imageUrl;
    image.style.width = '100%';
    image.style.height = 'auto';
    image.style.borderRadius = '8px';
    image.style.objectFit = 'cover';

    const overlayText = document.createElement('div');
    overlayText.style.position = 'absolute';
    overlayText.style.top = '50%';
    overlayText.style.left = '50%';
    overlayText.style.transform = 'translate(-50%, -50%)';
    overlayText.style.padding = '10px';
    overlayText.style.backgroundColor = 'rgba(0, 0, 0, 0.5)';
    overlayText.style.borderRadius = '8px';
    overlayText.innerHTML = text;

    titleImage.appendChild(image);
    titleImage.appendChild(overlayText);
    container.appendChild(titleImage);

    const target = document.querySelector(selector) || document.body;
    target.appendChild(container);

    onScrollIntoView(container, () => {
        container.style.opacity = "1";
        container.classList.add('animate');
    });
}
function onScrollIntoView(element, callback) {
    // Make sure the input is a valid element
    if (!(element instanceof Element)) {
        throw new Error('First argument must be a DOM element.');
    }

    // Function to check if the element is currently in view
    const isElementInViewport = (el) => {
        const rect = el.getBoundingClientRect();
        return (
            rect.top >= 0 &&
            rect.left >= 0 &&
            rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
            rect.right <= (window.innerWidth || document.documentElement.clientWidth)
        );
    };

    // Check if the element is already in view
    if (isElementInViewport(element)) {
        callback();
        return; // Exit early to avoid setting up the observer
    }

    // Create a new Intersection Observer
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Call the callback function when the element comes into view
                callback();

                // Disconnect the observer to avoid repeated calls
                observer.disconnect();
            }
        });
    });

    // Start observing the specified element
    observer.observe(element);
}

function createFullPageImageWithText(imageUrl, centerText, selector = 'body', leftText = '', rightText = '') {
    const container = document.createElement('div');
    container.classList.add('full-page-image-container');

    // Set background image and styles for the container
    container.style.position = 'relative';
    container.style.backgroundImage = `url(${imageUrl})`;
    container.style.backgroundSize = 'cover';
    container.style.backgroundPosition = 'center';
    container.style.height = '100vh'; // Full height of the viewport
    container.style.width = '100vw'; // Full width of the viewport';
    container.style.color = '#fff'; // Default text color
    container.style.display = 'flex';
    container.style.alignItems = 'center';
    container.style.justifyContent = 'center';
    container.style.flexDirection = 'column';
    container.style.textAlign = 'center';

    // Create center text
    const centerTextDiv = document.createElement('div');
    centerTextDiv.classList.add('full-page-center-text');
    centerTextDiv.style.fontSize = '2rem'; // Customize font size
    centerTextDiv.style.fontWeight = 'bold'; // Make the text bold
    centerTextDiv.style.padding = '20px'; // Add padding
    centerTextDiv.style.background = 'rgba(0, 0, 0, 0.5)'; // Optional background for better contrast
    centerTextDiv.style.borderRadius = '8px'; // Add rounded corners
    centerTextDiv.innerHTML = centerText;
    container.appendChild(centerTextDiv);

    // Create left text if provided
    if (leftText) {
        const leftTextDiv = document.createElement('div');
        leftTextDiv.classList.add('full-page-left-text');
        leftTextDiv.style.position = 'absolute';
        leftTextDiv.style.top = '50%';
        leftTextDiv.style.left = '20px';
        leftTextDiv.style.transform = 'translateY(-50%)';
        leftTextDiv.style.fontSize = '1.5rem';
        leftTextDiv.style.background = 'rgba(0, 0, 0, 0.5)';
        leftTextDiv.style.padding = '10px';
        leftTextDiv.style.borderRadius = '8px';
        leftTextDiv.innerHTML = leftText;
        container.appendChild(leftTextDiv);
    }

    // Create right text if provided
    if (rightText) {
        const rightTextDiv = document.createElement('div');
        rightTextDiv.classList.add('full-page-right-text');
        rightTextDiv.style.position = 'absolute';
        rightTextDiv.style.top = '50%';
        rightTextDiv.style.right = '20px';
        rightTextDiv.style.transform = 'translateY(-50%)';
        rightTextDiv.style.fontSize = '1.5rem';
        rightTextDiv.style.background = 'rgba(0, 0, 0, 0.5)';
        rightTextDiv.style.padding = '10px';
        rightTextDiv.style.borderRadius = '8px';
        rightTextDiv.innerHTML = rightText;
        container.appendChild(rightTextDiv);
    }

    // Append the container to the specified selector
    const target = document.querySelector(selector) || document.body;
    target.appendChild(container);
}


function seededRandom(seed) {
    const mod = 233280; // Large modulus
    const multiplier = 9301; // Multiplier
    const increment = 49297; // Increment
    seed = (seed * multiplier + increment) % mod;
    return seed / mod;
}

// Initialize a seed (can be any number, e.g., based on a hash of the page or a fixed number)
let seed = 12345; // Fixed seed ensures consistency

// Replace Math.random with a seeded random generator
function getSeededRandom() {
    seed = (seed * 9301 + 49297) % 233280; // Update seed
    return seed / 233280; // Return random number between 0 and 1
}
// Call the function to create a splash page
createFullPageImageWithText(
    '{{asset('images/background.jpg')}}', // Full-page image of community life
    `
        <h1 style="font-size: 3rem; margin: 0; color: #ffdd57;">Connecting People, One Task at a Time</h1>
        <p style="font-size: 1.5rem; margin: 10px 0;">Find help, offer a hand, or share ideas—right in your neighborhood.</p>
        <div style="margin-top: 20px;">
            <button style="padding: 10px 20px; font-size: 1rem; color: white; background: #4caf50; border: none; border-radius: 5px; cursor: pointer; margin-right: 10px;" onclick="window.location.href='/login'">Get Started</button>
            <button style="padding: 10px 20px; font-size: 1rem; color: white; background: #2196f3; border: none; border-radius: 5px; cursor: pointer;" onclick="window.location.href='/learn-more'">Learn More</button>
        </div>
    `,
    'body', // Append to the body
    'Welcome to Our Community', // Left side text
    'Help Your Neighborhood Grow!' // Right side text
);
// document.addEventListener('DOMContentLoaded', () => {
    const images = [
        "{{ asset('images/image1.jpg') }}",
        "{{ asset('images/image2.jpg') }}",
        "{{ asset('images/image3.jpg') }}",
        "{{ asset('images/image4.jpg') }}",
        "{{ asset('images/image5.jpg') }}",
        "{{ asset('images/image6.jpg') }}",
        "{{ asset('images/image7.jpg') }}",
        "{{ asset('images/image8.jpg') }}",
        "{{ asset('images/image9.jpg') }}"
    ];

    const texts = [
        `Connect with your neighbors to complete tasks.<div style="margin-top: 20px;">
            <button style="padding: 10px 20px; font-size: 1rem; color: white; background: #4caf50; border: none; border-radius: 5px; cursor: pointer; margin-right: 10px;" onclick="window.location.href='/login'">Get&nbsp;Started&nbsp;&#8658;</button>
                   </div>`,
        `Share or sell unused items from your home.<div style="margin-top: 20px;">
            <button style="padding: 10px 20px; font-size: 1rem; color: white; background: #2196f3; border: none; border-radius: 5px; cursor: pointer; margin-right: 10px;" onclick="window.location.href='/login'">Get&nbsp;Started&nbsp;&#8658;</button>
                   </div>`,
        `Organize charity drives and local events.<div style="margin-top: 20px;">
            <button style="padding: 10px 20px; font-size: 1rem; color: white; background: #4caf50; border: none; border-radius: 5px; cursor: pointer; margin-right: 10px;" onclick="window.location.href='/login'">Get&nbsp;Started&nbsp;&#8658;</button>
                   </div>`,
        `Trade skills and services with people nearby.<div style="margin-top: 20px;">
            <button style="padding: 10px 20px; font-size: 1rem; color: white; background: #2196f3; border: none; border-radius: 5px; cursor: pointer; margin-right: 10px;" onclick="window.location.href='/login'">Get&nbsp;Started&nbsp;&#8658;</button>
                   </div>`,
        `Help each other make a difference in your community.<div style="margin-top: 20px;">
            <button style="padding: 10px 20px; font-size: 1rem; color: white; background: #4caf50; border: none; border-radius: 5px; cursor: pointer; margin-right: 10px;" onclick="window.location.href='/login'">Get&nbsp;Started&nbsp;&#8658;</button>
                   </div>`,
        `Chat and collaborate on neighborhood projects.<div style="margin-top: 20px;">
            <button style="padding: 10px 20px; font-size: 1rem; color: white; background: #2196f3; border: none; border-radius: 5px; cursor: pointer; margin-right: 10px;" onclick="window.location.href='/login'">Get&nbsp;Started&nbsp;&#8658;</button>
                   </div>`,
        `Discover new opportunities around the corner.<div style="margin-top: 20px;">
            <button style="padding: 10px 20px; font-size: 1rem; color: white; background: #4caf50; border: none; border-radius: 5px; cursor: pointer; margin-right: 10px;" onclick="window.location.href='/login'">Get&nbsp;Started&nbsp;&#8658;</button>
                   </div>`,
        `Join forces to create a better block or city.<div style="margin-top: 20px;">
            <button style="padding: 10px 20px; font-size: 1rem; color: white; background: #2196f3; border: none; border-radius: 5px; cursor: pointer; margin-right: 10px;" onclick="window.location.href='/login'">Get&nbsp;Started&nbsp;&#8658;</button>
                   </div>`,
        `Make your voice heard and your ideas real.<div style="margin-top: 20px;">
            <button style="padding: 10px 20px; font-size: 1rem; color: white; background: #4caf50; border: none; border-radius: 5px; cursor: pointer; margin-right: 10px;" onclick="window.location.href='/login'">Get&nbsp;Started&nbsp;&#8658;</button>
                   </div>`
    ];

    // Dynamically create sections for each image and text
    images.forEach((imageUrl, index) => {
        const text = texts[index];
        const selector = 'body'; // Appends to the body
        const layout = index % 2 === 0 ? 'under' : 'side-by-side'; // Alternate layouts

        // Choose a function randomly for variety
        const animationFunctions = [
            createSlideInAnimation,
            createFadeInAnimation,
            createZoomInAnimation,
            createTitleImageWithText
        ];
        const randomIndex = Math.floor(getSeededRandom() * animationFunctions.length);
        const animationFunction = animationFunctions[randomIndex];

        // Call the selected animation function
        animationFunction(imageUrl, text, selector, layout);

        // Add "Get Started" button to each section
        const section = document.querySelector(`${selector} > .full-page-image-container:last-child`);
        if (section) {
            const button = document.createElement('button');
            button.textContent = 'Get Started';
            button.className = 'login-button';
            button.addEventListener('click', () => {
                window.location.href = '/login'; // Replace with your desired link
            });
            section.appendChild(button);
        }
    });

    createFullPageImageWithText(
    '{{asset('images/background.jpg')}}', // Full-page image of community life
    `
        <h1 style="font-size: 3rem; margin: 0; color: #ffdd57;">Connecting People, One Task at a Time</h1>
        <p style="font-size: 1.5rem; margin: 10px 0;">Find help, offer a hand, or share ideas—right in your neighborhood.</p>
        <div style="margin-top: 20px;">
            <button style="padding: 10px 20px; font-size: 1rem; color: white; background: #4caf50; border: none; border-radius: 5px; cursor: pointer; margin-right: 10px;" onclick="window.location.href='/login'">Get Started</button>
            <button style="padding: 10px 20px; font-size: 1rem; color: white; background: #2196f3; border: none; border-radius: 5px; cursor: pointer;" onclick="window.location.href='/learn-more'">Learn More</button>
        </div>
    `,
    'body', // Append to the body
    'Welcome to Our Community', // Left side text
    'Help Your Neighborhood Grow!' // Right side text
);
// });



setTimeout(() => {
    window.scrollTo(0, 0); // Scrolls to the top of the page

}, 100);
</script>
@endsection
