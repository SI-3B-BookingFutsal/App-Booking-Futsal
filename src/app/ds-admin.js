document.addEventListener('DOMContentLoaded', function () {
  let containerIncome = document.getElementById('container-income');
  let graph = document.getElementById('graph');
  let contentIncome = document.getElementById('content-income');

  containerIncome.addEventListener('click', function () {
    if (graph.style.display === 'block' && contentIncome.style.display === 'none') {
      graph.style.display = 'none';
      contentIncome.style.display = 'block';
      containerIncome.classList.add('active');
    } else {
      graph.style.display = 'block';
      contentIncome.style.display = 'none';
    }
  });
});