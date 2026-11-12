function threeSum(nums: number[]): number[][] {
    nums.sort((a, b) => a - b)
    const length: number = nums.length 
    // keep track of correct 3sums we've already added 
    // using string to ensure we are checking content rather than references
    const seen = new Set<string>()
    let result: number[][] = []

    for (let i: number = 0; i < length - 2; i++) {
        // if we are past the first entry and if the current and next numbers are the same, skip
        // this avoid duplicate starting numbers
        if (i > 0 && nums[i] === nums[i - 1]) continue 

        let target: number = -nums[i]
        // start a new map per starting number
        let map = new Map<number, number>()

        // find 2 numbers that add up to to -nums[i]
        for (let j: number = i + 1; j < length; j++) {
            const difference: number = target - nums[j]

            if (map.has(difference)) {
                const answer = [
                    nums[i],
                    difference, 
                    nums[j]
                ]
                const seen_array = answer.join(",")

                // if we have not seen the answer before, add it to the seen set and result array
                if (!seen.has(seen_array)) {
                    result.push(answer)
                    seen.add(seen_array)
                }
            }

            // store the current number and its index
            map.set(nums[j], j)
        }
    }

    return result
};
