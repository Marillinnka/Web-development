window.onload = function () {
    carousel();
};
function rightwards() {
    document.querySelector('#left').onclick = function () {
      let items = document.querySelector('.block-bottom__slider-cards');
      let firstItem = items.firstElementChild;
      let lastItem = items.lastElementChild;
      items.insertBefore(lastItem, firstItem);
    }
}
function leftwards(){
    document.querySelector('#right').onclick = function () {
      let items = document.querySelector('.block-bottom__slider-cards');
      let firstItem = items.firstElementChild;
      items.append(firstItem);
    }
}
function carousel(){
    rightwards();
    leftwards();
}
