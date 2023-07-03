var myOffcanvas = document.getElementById('offcanvasScrolling')
var bsOffcanvas = new bootstrap.Offcanvas(myOffcanvas)

document.querySelector('.filter-offcanvas').addEventListener('click', function () {
  bsOffcanvas.toggle()
})
