(() => {
	if (typeof NodeList.prototype.forEach !== 'function')  {
		NodeList.prototype.forEach = Array.prototype.forEach;
	}
	const deviceWidth= window.innerWidth;
	const tabletWidth	= 1200;
	const mobileWidth	= 860;
	let yOffset = 0;
	let prevScrollHeight = 0;
	let currentScene = 0;
	let enterNewScene = false;
	let acc = 0.5;
	let delayedYOffset = 0;
	let rafId;
	let rafState;
	let deviceType;

	const sceneInfo = [
		{
			// 0
			type: 'sticky',
			heightNum: 4.18,
			scrollHeight: 0,
			objs: {
				container: document.querySelector('#scroll-section-0'),
				messageA: document.querySelector('#scroll-section-0 .fadeinleft'),
				messageB: document.querySelector('#scroll-section-0 .fadeinright'),
				contentList : document.querySelector('#scroll-section-0 .video-wrap'),
			},
			//values: {
				//messageA_opacity_in: [0, 1, { start: 0.1, end: 0.2 }],
				//messageB_opacity_in: [0, 1, { start: 0.1, end: 0.2 }],
				//messageA_translateX_in: [0, 50, { start: 0.1, end: 0.2 }],
				//messageB_translateX_in: [0, 50, { start: 0.1, end: 0.2 }],
				//messageA_opacity_out: [1, 0, { start: 0.8, end: 0.9 }],
				//messageB_opacity_out: [1, 0, { start: 0.8, end: 0.9 }],
				//messageA_translateX_out: [50, 0, { start: 0.8, end: 0.9 }],
				//messageB_translateX_out: [50, 0, { start: 0.8, end: 0.9 }],
			//}
		},
		{
			// 2
			type: 'normal',
			scrollHeight: 0,
			objs: {
				container: document.querySelector('#scroll-section-2'),
			}
		},
		{
			// 3
			type: 'normal',
			scrollHeight: 0,
			objs: {
				container: document.querySelector('#scroll-section-3'),
			}
		},
		{
			// 4
			type: 'normal',
			scrollHeight: 0,
			objs: {
				container: document.querySelector('#scroll-section-3'),
			}
		},
		{
			// 5
			type: 'normal',
			scrollHeight: 0,
			objs: {
				container: document.querySelector('#scroll-section-3'),
			}
		},
		{
			// 6
			type: 'normal',
			scrollHeight: 0,
			objs: {
				container: document.querySelector('#scroll-section-3'),
			}
		},
	
	];

//각 스크롤 섹션의 높이 세팅
	function setLayout() {
		//type = 'sticky', 'normal' 의 높이값 설정
		if(deviceType == 'lg'){
			for(let i = 0; i < sceneInfo.length; i++){
				if(sceneInfo[i].type === 'sticky'){
					sceneInfo[i].scrollHeight = sceneInfo[i].heightNum * window.innerHeight;
				} else if(sceneInfo[i].type === 'normal'){
					sceneInfo[i].scrollHeight = sceneInfo[i].objs.container.offsetHeight;
				}
				sceneInfo[i].objs.container.style.height = `${sceneInfo[i].scrollHeight}px`;
			}
		};

		yOffset = window.pageYOffset;

		let totalScrollHeight = 0;
		for (let i = 0; i < sceneInfo.length; i++) {
			totalScrollHeight += sceneInfo[i].scrollHeight;
			if (totalScrollHeight >= yOffset) {
				currentScene = i;
				break;
			}
		}
		document.body.setAttribute('id', `show-scene-${currentScene}`);
	}
	// currentYOffset = 현재씬에서 얼마나 스크롤 됬는지
	function calcValues(values, currentYOffset) {
		let rv;	
		// 현재 씬(스크롤 섹션)에서 스크롤된 범위를 비율(0~1)로 구하기
		const scrollHeight = sceneInfo[currentScene].scrollHeight;
		const scrollRatio = currentYOffset / scrollHeight;

		if (values.length === 3) {
			// start ~ end 사이에 애니메이션 실행 start,end값이 있는 경우만
			const partScrollStart = values[2].start * scrollHeight;
			const partScrollEnd = values[2].end * scrollHeight;
			const partScrollHeight = partScrollEnd - partScrollStart;

			if (currentYOffset >= partScrollStart && currentYOffset <= partScrollEnd) {
				rv = (currentYOffset - partScrollStart) / partScrollHeight * (values[1] - values[0]) + values[0];
			} else if (currentYOffset < partScrollStart) {
				rv = values[0];
			} else if (currentYOffset > partScrollEnd) {
				rv = values[1];
			}
		} else {
			rv = scrollRatio * (values[1] - values[0]) + values[0];
		}

		return rv;
	}

	function playAnimation() {
		const objs = sceneInfo[currentScene].objs;
		const values = sceneInfo[currentScene].values;
		const currentYOffset = yOffset - prevScrollHeight;
        const scrollHeight = sceneInfo[currentScene].scrollHeight;
        const scrollRatio = currentYOffset / scrollHeight;


		switch (currentScene) {
			case 0:
				//if(deviceType == 'lg'){
					//if(scrollRatio <= 0.22){
						//// in
						//objs.messageA.style.opacity = calcValues(values.messageA_opacity_in, currentYOffset);
						//objs.messageA.style.left = `${calcValues(values.messageA_translateX_in, currentYOffset)}%`;
					//} else{
						////out
						//objs.messageA.style.opacity = calcValues(values.messageA_opacity_out, currentYOffset);
						//objs.messageA.style.left = `${calcValues(values.messageA_translateX_out, currentYOffset)}%`;
					//}
					//if(scrollRatio <= 0.23){
						////in
						//objs.messageB.style.opacity = calcValues(values.messageB_opacity_in, currentYOffset);
						//objs.messageB.style.right = `${calcValues(values.messageB_translateX_in, currentYOffset)}%`;
					//} else{
						//objs.messageB.style.opacity = calcValues(values.messageB_opacity_out, currentYOffset);
						//objs.messageB.style.right = `${calcValues(values.messageB_translateX_out, currentYOffset)}%`;
					//}
				//}
				break;
			case 1:
				break;
			case 2:
				break;
			case 3:
				break;
			case 4:
				break;
			case 5:
				break;
			case 6:
				break;
		}
	}

	function scrollLoop() {
		enterNewScene = false;//새로운 씬이 시작될때 0값이 -가 되는 것을 방지하기 위한 처리
		//prevScrollHeight = 페이지 전체의 스크롤 길이
		prevScrollHeight = 0; 

		for (let i = 0; i < currentScene; i++) {
			prevScrollHeight += sceneInfo[i].scrollHeight;
		}

		if (delayedYOffset < prevScrollHeight + sceneInfo[currentScene].scrollHeight) {
			document.body.classList.remove('scroll-effect-end');
		}

		if (delayedYOffset > prevScrollHeight + sceneInfo[currentScene].scrollHeight) {
			enterNewScene = true;
			if (currentScene === sceneInfo.length - 1) {
				document.body.classList.add('scroll-effect-end');
			}
			if (currentScene < sceneInfo.length - 1) {
				currentScene++;
			}
			document.body.setAttribute('id', `show-scene-${currentScene}`);
		}

		if (delayedYOffset < prevScrollHeight && delayedYOffset !== 0) {
			enterNewScene = true;
			if (currentScene === 0) return;
			currentScene--;
			document.body.setAttribute('id', `show-scene-${currentScene}`);
		}
		
		if (enterNewScene) return;

		playAnimation();
	}

	function loop() {
		delayedYOffset = delayedYOffset + (yOffset - delayedYOffset) * acc;

        if (delayedYOffset < 1) {
            scrollLoop();
        }

		rafId = requestAnimationFrame(loop);

		if (Math.abs(yOffset - delayedYOffset) < 1) {
			cancelAnimationFrame(rafId);
			rafState = false;
		}
	}

	window.addEventListener('load', () => {
		//����̽� �ʺ�
		if(deviceWidth > tabletWidth){
			deviceType = 'lg';
		}
		if(deviceWidth <= tabletWidth && deviceWidth > mobileWidth){
			deviceType = 'md';
		}
		if(deviceWidth <= mobileWidth){
			deviceType = 'sm';
		}

		if(deviceType == 'sm'){
			let vh = window.innerHeight * 0.01;
			document.documentElement.style.setProperty("--vh", `${vh}px`);
		}	

		setLayout();

        let tempYOffset = yOffset;
        let tempScrollCount = 0;
        if (tempYOffset > 0) {
            let siId = setInterval(() => {
                scrollTo(0, tempYOffset);
                tempYOffset += 5;

                if (tempScrollCount > 20) {
                    clearInterval(siId);
                }
                tempScrollCount++;
            }, 20);
        } 

		window.addEventListener('scroll', () => {
			yOffset = window.pageYOffset;
			scrollLoop();

			if (!rafState) {
				rafId = requestAnimationFrame(loop);
				rafState = true;
			}
		});



  		window.addEventListener('orientationchange', () => {
			setTimeout(() => {
				window.location.reload();
			}, 500);
  		});
	});

})();
