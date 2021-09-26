$(document).ready(() => {
  // Render navigation bar
  if (document.getElementById("navbar")){
    ReactDOM.render(<NavigationBar />, document.getElementById("navbar"));
  // Active page on navbar
  var page = window.location.pathname;
  if (page == "/") {
    document.getElementById("/index.html").className = "active";
  } else if(page == "/success.html" || page == "/error.html" || page == "/privacy_policy.html" || page == "/errors/404.html"){}
   else {
    document.getElementById(page).className = "active";
  }
  // Take back to index on image click 
  document.getElementById("navbar-logo").onclick = () => {
    window.location.href = "/"
  }
  // Onclick to show the navbar on mobile
  $(document).ready(() => {
    var bars = document.getElementsByClassName("fas fa-bars")[0];
    var navbar = document.getElementsByClassName("navbar")[0];
    bars.onclick = () => {
      if (navbar.className === "navbar-responsive") {
        navbar.className = "navbar";
        document.getElementsByClassName("fas fa-times")[0].className = "fas fa-bars";
      }
      else {
        navbar.className = "navbar-responsive";
        bars.className = "fas fa-times"
        document.getElementsByClassName("fas fa-times")[0].style.fontSize = "25px";
      }
    }
  });
  };
  // Render footer
  if (document.getElementById("footer")){
    ReactDOM.render(<Footer />, document.getElementById("footer"));
    };
  // Reservations form
  if (document.getElementById("reservations")){
    document.getElementById("reservations").onclick = () => {
      const modal = document.getElementsByClassName("modal")[0];
      modal.style.display = "block";
      // Making a reservation time gap for 3 months
      const lastDay = (y, m) => {
        return new Date(y, m, 0).getDate();
      }
      var date = new Date();
      date.setDate(date.getDate() + 1);
      var currentYear = date.getFullYear();
      var currentMonth = date.getMonth() + 1;
      var currentDay = date.getDate();
      //var startDate = `${currentYear}-${currentMonth}-${currentDay}`;
      var today = new Date(date);
      // To make sure rotation goes just fine
      switch (currentMonth) {
        case 1: case 2: case 3: case 4: case 5: case 6: case 7: case 8:
          var endDate = `${currentYear}-0${currentMonth + 2}-${lastDay(currentYear,currentMonth)}`;
          break;
        case 9:
          var endDate = `${currentYear}-${currentMonth + 2}-${lastDay(currentYear, currentMonth)}`;
          break;
        case 11:
          var endDate = `${currentYear + 1}-1-${lastDay(currentYear + 1, 1)}`;
          break;
        case 12:
          var endDate = `${currentYear + 1}-2-${lastDay(currentYear + 1, 2)}`;
          break;
        default:
          var endDate = `${currentYear}-${currentMonth + 2}-${lastDay(currentYear, currentMonth)}`;
      };
      var endDate = new Date(endDate)
      setTimeout(() => { 
        ReactDOM.render(<ReservationForm />, modal); 
        document.getElementsByClassName("fas fa-times")[0].onclick = () => { 
          modal.style.display = "none";
          picker.destroy();
        };
        // Date picker setup
        var picker = new Pikaday({ 
          field: document.getElementById('datepicker'),
          minDate: today,
          maxDate:endDate,
          defaultDate:today,
          setDefaultDate: true,
        });
      },2);
    };
  };
  // Render construction sign
  if (document.getElementById("construction")){
    ReactDOM.render(<ConstructionSign/>,document.getElementById("construction"));
  };
})