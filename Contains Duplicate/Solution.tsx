function containsDuplicate(nums: number[]) : boolean {
    // first sort the array in ascending order
    nums.sort((num1, num2) => num1 - num2)

    return nums.some((element, index, array) => 
        element === array[index + 1]
    )
};
