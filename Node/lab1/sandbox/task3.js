const os = require('os');
const userName = os.userInfo().username;
const greetingMessage = `Hello, ${userName}!`;
console.log(greetingMessage);
