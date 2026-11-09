function isAnagram(s: string, t: string) {
    let s_sorted: string[] = s.split('').sort()
    let t_sorted: string[] = t.split('').sort()

    s = s_sorted.join('')
    t = t_sorted.join('')

    return s === t
};
