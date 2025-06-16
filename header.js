class MyHeader extends HTMLElement {
  connectedCallback() {
    this.innerHTML = `
      <header>
        <a href="index.html" class="logo">
          <img src="circular_logo.ico" alt="Georgia Hills">
        </a>
        <div id="Headerid">
          <nav class="nav_bar">
            <ul class="nav_list"> 
              <li><a href="index.html">Home</a></li>
              <li><a href="tours.html">Tours</a></li>
              <li><a href="about.html">About Us</a></li>
              <li><a href="reviews.html">Reviews</a></li>
              <li><a href="contact.html">Contact Us</a></li>
            </ul>
          </nav>
        </div>
        <button class="book" onclick="location.href='login.html'" type="button" >Book Now</button>
      </header>
    `;

    const path = window.location.pathname.split("/").pop() || 'index.html';
    this.querySelectorAll('.nav_bar a').forEach(link => {
      if (link.getAttribute('href') === path) {
        link.classList.add('active');
      }
    });
  }
}

customElements.define('my-header', MyHeader);
