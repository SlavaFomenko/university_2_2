const inputData = process.argv.slice(2);
if (inputData.length === 0) {
  console.log('Введіть дані при запуску додатку.');
} else {
  console.log('Введені дані:', inputData);
}
