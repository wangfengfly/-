/*
 * 数组中只有一个元素出现一次，其他元素都出现三次，找出这个元素。
*/
#include <stdio.h>

#define BIT_SIZE 32

int main(){
	int arr[] = {1,2,2,2,3,3,3,4,4,4};
	int n = sizeof(arr) / sizeof(int);

	int res = 0;
	for(int i = 0; i < BIT_SIZE; i++){
		int x = 1 << i;
		int sum = 0;
		for(int j = 0; j < n; j++){
			if(arr[j] & x){
				sum++;
			}
		}
		if(sum % 3){
			res = res | x;
		}
	}
	printf("%d\n", res);
}
