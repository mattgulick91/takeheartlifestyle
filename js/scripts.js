// Delete parent of current node
function deleteParent(e){
  e.parentNode.parentNode.removeChild(e.parentNode);
}

// Scroll to top
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
