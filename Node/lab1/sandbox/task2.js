const fs = require('fs');
const dataToWrite = "Hello world";
const fileName = 'output.txt';
fs.appendFile(fileName, dataToWrite + '\n', (err) => {
  if (err) {
    console.error('Ошибка при записи в файл:', err);
    return;
  }
  console.log(`Данные успешно дописаны в файл ${fileName}`);
});
