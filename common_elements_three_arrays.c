/*
 * 找出三个有序数组中共同的元素
 * 时间复杂度O(n1+n2+n3)
 */
#include <stdio.h>

void print_commons(int* ar1, int len1, int* ar2, int len2, int* ar3, int len3){
	int i=0, j=0, k=0;
	while(i < len1 && j < len2 && k < len3){
		if(ar1[i] == ar2[j] && ar2[j] == ar3[k]){
			printf("%d ", ar1[i]);
			i++;
			j++;
			k++;
		}
		else if(ar1[i] < ar2[j]){
			i++;
		}
		else if(ar2[j] < ar3[k]){
			j++;
		}
		else{
			k++;
		}
	}
	printf("\n");
}

int main(){
	int ar1[] = {1, 5, 10, 20, 40, 80};
	int ar2[] = {6, 7, 20, 80, 100};
	int ar3[] = {3, 4, 15, 20, 30, 70, 80, 120};
	int len1 = sizeof(ar1) / sizeof(int);
	int len2 = sizeof(ar2) / sizeof(int);
	int len3 = sizeof(ar3) / sizeof(int);
	
	print_commons(ar1, len1, ar2, len2, ar3, len3);
}
