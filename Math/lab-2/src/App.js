import { useState } from 'react'
import styles from './App.module.scss'
import Input from './components/input'

function App() {
	const [A, setA] = useState([])
	const [B, setB] = useState([])
	const [relationMatrix, setRelationMatrix] = useState([])

	// Функция для проверки условия отношения
	const checkRelation = (a, b) => {
		return 2 * a < b
	}

	// Функция для создания матрицы отношений
	const generateRelationMatrix = () => {
		const matrix = []
		for (let i = 0; i < A.length; i++) {
			matrix[i] = []
			for (let j = 0; j < B.length; j++) {
				matrix[i][j] = checkRelation(A[i], B[j]) ? 1 : 0
			}
		}
		setRelationMatrix(matrix)
	}

	return (
		<div className={styles.app}>
			<div className={styles.operand}>
				<span>{'p = {(a,b)|a ∈ A & b ∈ B & 2a<b} ;'} </span>

				<span>
					A={'{'}
					<Input arr={setA} />
					{'}'}
				</span>

				<span>
					B={'{'}
					<Input arr={setB} />
					{'}'}
				</span>

				<button onClick={generateRelationMatrix}>Розрахувати</button>

				<span className={styles.result}>
					<span>A</span>
					<div className={styles.table}>
						<span>B</span>
						<table>
							<tr>
								<th></th>
								{B.map((b, index) => (
									<th key={index}>{b}</th>
								))}
							</tr>
							{relationMatrix.map((row, i) => (
								<tr key={i}>
									<th>{A[i]}</th>
									{row.map((value, j) => (
										<td key={j}>{value}</td>
									))}
								</tr>
							))}
						</table>
					</div>
				</span>
			</div>
		</div>
	)
}

export default App
