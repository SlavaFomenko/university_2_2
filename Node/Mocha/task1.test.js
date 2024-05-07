const { expect } = require('chai')
const { factorial } = require('./functions')

describe('factorial function', () => {
	it('should return the correct factorial for positive integers', () => {
		expect(factorial(5)).to.equal(120)
		expect(factorial(6)).to.equal(720)
	})

	it('should return 1 for 0 and 1', () => {
		expect(factorial(0)).to.equal(1)
		expect(factorial(1)).to.equal(1)
	})

	it('should return null for negative integers', () => {
		expect(factorial(-5)).to.be.null
		expect(factorial(-6)).to.be.null
	})
})
