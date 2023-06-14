function importHoverContent() {
    fetch('./components/uploadFile2.html')
      .then(function(response) {
        return response.text();
      })
      .then(function(data) {
        var hoverContent = document.createElement('div');
        hoverContent.innerHTML = data;
        document.getElementById('content').appendChild(hoverContent);
      })
      .catch(function(error) {
        console.log('Error:', error);
      });
  }

  // Panggil fungsi importHoverContent() saat halaman dimuat
  window.addEventListener('DOMContentLoaded', importHoverContent);