import React, { useState } from 'react'

const Select = ({ arr }) => {

	const onChange = ({ target }) => {
		arr(target.value)
	}

	return (
		<select onChange={onChange}>
			<option value='∪'>U</option>
			<option value='∩'>∩</option>
			<option value='-'>\</option>
			<option value='△'>△</option>
		</select>
	)
}

export default Select
