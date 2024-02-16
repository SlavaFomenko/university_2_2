const _ = require('lodash')
const numbers = [1, 2, 3, 4, 5]

// 1. _.sum() - обчислює суму чисел у масиві
const sum = _.sum(numbers)
console.log('Сума чисел:', sum)

// 2. _.map() - перетворює кожен елемент масиву за допомогою переданої функції
const squaredNumbers = _.map(numbers, num => num * num)
console.log('Квадрати чисел:', squaredNumbers)

// 3. _.filter() - фільтрує масив на основі заданої умови
const evenNumbers = _.filter(numbers, num => num % 2 === 0)
console.log('Парні числа:', evenNumbers)

// 4. _.sortBy() - сортує елементи масиву за заданим критерієм
const sortedNumbers = _.sortBy(numbers)
console.log('Відсортовані числа:', sortedNumbers)

// 5. _.includes() - перевіряє, чи містить масив вказаний елемент
const includesThree = _.includes(numbers, 3)
console.log('Масив містить число 3:', includesThree)
