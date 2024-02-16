// user.js

const fs = require('fs');

const getUserData = () => {
  try {
    const userData = fs.readFileSync('user.json', 'utf8');
    return JSON.parse(userData);
  } catch (error) {
    console.error('Помилка при читанні файлу user.json:', error);
    return null;
  }
};

const saveUserData = (userData) => {
  try {
    fs.writeFileSync('user.json', JSON.stringify(userData, null, 2));
    console.log('Дані користувача успішно збережені.');
  } catch (error) {
    console.error('Помилка при збереженні даних у файлі user.json:', error);
  }
};

const addLanguage = (title, level) => {
  const userData = getUserData();
  if (userData) {
    userData.languages.push({ title, level });
    saveUserData(userData);
    console.log('Мова успішно додана.');
  }
};


const removeLanguage = (title) => {
  const userData = getUserData();
  if (userData) {
    userData.languages = userData.languages.filter(lang => lang.title !== title);
    saveUserData(userData);
    console.log('Мова успішно видалена.');
  }
};

const listLanguages = () => {
  const userData = getUserData();
  if (userData) {
    console.log('Список мов користувача:');
    userData.languages.forEach(lang => {
      console.log(`${lang.title} (${lang.level})`);
    });
  }
};

const readLanguage = (title) => {
  const userData = getUserData();
  if (userData) {
    const lang = userData.languages.find(lang => lang.title === title);
    if (lang) {
      console.log(`Мова: ${lang.title}, Рівень: ${lang.level}`);
    } else {
      console.log('Мова не знайдена.');
    }
  }
};

module.exports = {
  addLanguage,
  removeLanguage,
  listLanguages,
  readLanguage
};
