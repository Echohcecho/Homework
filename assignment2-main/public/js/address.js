function initMap() {
  const input = document.getElementById('address-search');
  const autocomplete = new google.maps.places.Autocomplete(input);
}

function validate() {
  const address = document.getElementById('address-search').value;

  if (address === '') {
    return false;
  }
}
