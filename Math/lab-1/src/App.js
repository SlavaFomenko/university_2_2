import { useState } from 'react'
import styles from './App.module.scss'
import Input from './components/input'
import Select from './components/select'
import img1 from './utils/images/1.png'
import img2 from './utils/images/2.png'
import img3 from './utils/images/3.png'
import img4 from './utils/images/4.png'

function App() {
	const [a, setA] = useState([])
	const [b, setB] = useState('')
	const [operation, setOperation] = useState('∪')
	const [result, setResult] = useState([])

	const performOperation = () => {
		if (operation === '∪') {
			setResult([...new Set([...a, ...b])])
		}
		if (operation === '∩') {
			setResult(a.filter(value => b.includes(value)))
		}
		if (operation === '-') {
			// a = ['1', '2', '3', '4', '5']
			// b = ['4', '5', '6', '7', '8', '9', '0']
			setResult(a.filter(item => !b.includes(item)))
		}
		if (operation === '△') {
			setResult([
				...new Set([
					...a.filter(value => !b.includes(value)),
					...b.filter(value => !a.includes(value)),
				]),
			])
		}
	}

	return (
		<div className={styles.app}>
			<div className={styles.operand}>
				<span>
					A={'{'}
					<Input arr={setA} />
					{'}'}
				</span>

				<Select arr={setOperation} />

				<span>
					B={'{'}
					<Input arr={setB} />
					{'}'}
				</span>

				<button onClick={performOperation}>=</button>
				<span className={styles.result}>
					Результат
					{'{'}
					{result.join(',')}
					{'}'}
				</span>
			</div>
			<div className={styles.image}>
				<span className={styles.text}>
					<span>A</span>
					<span>B</span>
				</span>
				{operation === '∪' ? <img src={img1} /> : ''}
				{operation === '∩' ? <img src={img2} /> : ''}
				{operation === '-' ? <img src={img3} /> : ''}
				{operation === '△' ? <img src={img4} /> : ''}
			</div>
		</div>
	)
}

export default App
