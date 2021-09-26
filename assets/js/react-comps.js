// Navigation bar
const NavigationBar = () => {
  return (
    <div className="navbar">
      <img id="navbar-logo" src="assets/images/logo.jpg" alt="Logo" />
      <i id="ham" className="fas fa-bars"></i>
      <div className="pages">
        <div id="/index.html"><a href="./index.html">Home</a></div>
        <div id="/gallery.html"><a href="./gallery.html">Gallery</a></div>
      </div>
    </div>
  )
};
// Footer
const Footer = () => {
  return (
    <footer>
      <a href="../../privacy_policy.html"><p>Privacy Policy</p></a>
      <p>RESTAURANT NAME, LOCATION OF THE RESTAURANT</p>
      <div className="contact-icons">
        <a href="mailto:mail@thedukesunninghill.com"><i className="fas fa-envelope"></i></a>
      </div>
      <a href="https://kristofhracza.com"><p>Built by Kristof Hracza</p></a>
    </footer>
  )
};
//  Reservation form
const ReservationForm = () => {
  return(
    <div>
      <form method="POST" action="../private/php/reserve.php">
        <i className="fas fa-times"></i>
        <h4>Make reservations</h4>
        <input type="text" name="name" placeholder="Name" required/><br/>
        <input type="email" name="email" placeholder="E-mail" required/><br />
        <input type="text" name="phone" placeholder="Phone number" inputMode="numeric" required/><br/>
        <select name="guests" required>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
        </select><br />
        <select name="time" required>
          <option value="12:00">12:00</option>
          <option value="12:15">12:15</option>
          <option value="12:30">12:30</option>
          <option value="12:45">12:45</option>
          <option value="13:00">13:00</option>
          <option value="13:15">13:15</option>
          <option value="13:30">13:30</option>
          <option value="13:45">13:45</option>
          <option value="14:00">14:00</option>
          <option value="17:00">17:00</option>
          <option value="17:15">17:15</option>
          <option value="17:30">17:30</option>
          <option value="17:45">17:45</option>
          <option value="18:00">18:00</option>
          <option value="18:15">18:15</option>
          <option value="18:30">18:30</option>
          <option value="18:45">18:45</option>
          <option value="19:00">19:00</option>
          <option value="19:15">19:15</option>
          <option value="19:30">19:30</option>
          <option value="19:45">19:45</option>
          <option value="20:00">20:00</option>
          <option value="20:15">20:15</option>
          <option value="20:30">20:30</option>
        </select><br/>
        <input type="text" name="date" id="date" autoComplete="off" readOnly="readonly" placeholder="Date" id="datepicker"/><br/>
        <input type="submit" value="Make a reservation"/>
      </form>
    </div>
  )
};