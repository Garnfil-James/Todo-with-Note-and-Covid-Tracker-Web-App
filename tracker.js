fetch('https://api.covid19api.com/summary')
.then(res => res.json())
.then(data => {
  const ph = data['Countries'][136];
  const date = document.querySelector('.date');
  const confirmedCases = document.querySelector('.confirmed-cases');
  const deaths = document.querySelector('.death');
  const newCases = document.querySelector('.new-cases');
  const newDeaths = document.querySelector('.new-deaths');
  date.innerHTML = 'As of: ' +  ph['Date'];
  confirmedCases.innerHTML = ph['TotalConfirmed'];
  deaths.innerHTML = ph['TotalDeaths'];
  newCases.innerHTML = ph['NewConfirmed'];
  newDeaths.innerHTML = ph['NewDeaths'];
})