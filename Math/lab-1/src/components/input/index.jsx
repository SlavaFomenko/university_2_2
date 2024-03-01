import React, { useState } from 'react'

const Input = ({ arr }) => {
	const [string, setValue] = useState('')

	const onChange = ({ target }) => {
		setValue(target.value)
		arr(target.value.split(','))
	}
	return <input value={string} onChange={onChange} />
}

export default Input
