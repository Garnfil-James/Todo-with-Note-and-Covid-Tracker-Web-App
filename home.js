const todoOption = document.querySelectorAll('.todo-option');

todoOption.forEach( option => {
  if (option.value == 'Doing') {
    option.classList.add('active-option');
  } else{
    option.classList.remove('active-option');
  }
  if (option.value == 'Done') {
    option.classList.add('done-item');
  }
})

