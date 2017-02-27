/*
 * 有序数组中，只有一个元素出现一次，其他元素都出现两次。
 * 时间复杂度O(lgn), 还可以用元素亦或，最后的取值就是只出现一次的元素O(n)
 */
#include <stdio.h>

int find_result(int* arr, int l, int h){
	if(l > h){
		return -1;
	}
	if(l == h){
		return l;
	}
	int mid = (l+h)/2;
	if(mid % 2 == 0){
		if(arr[mid] == arr[mid+1]){
			return find_result(arr, mid+2, h);
		}else if(arr[mid] < arr[mid+1]){
			return find_result(arr, l, mid);
		}
	}else{
		if(arr[mid] == arr[mid+1]){
			return find_result(arr, l, mid-1);
		}else if(arr[mid] < arr[mid+1]){
			return find_result(arr, mid+1, h);
		}
	}
}

int main(){
	//int arr[] = {1, 1, 3, 3, 4, 5, 5, 7, 7, 8, 8};
	int arr[] = {1, 1, 3, 3, 4, 4, 5, 5, 7, 7, 8};
	int len = sizeof(arr)/sizeof(arr[0]);
	int index = find_result(arr, 0, len - 1);
	if(index != -1){
		printf("%d\n", arr[index]);
	}
}
