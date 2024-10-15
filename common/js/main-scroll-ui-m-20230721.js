(() => {

	let yOffset = 0;
	let prevScrollHeight = 0;
	let currentScene = 0;
	let enterNewScene = false;
    let acc = 0.2;
    let delayedYOffset = 0;
    let rafState;

	const sceneInfo = [
		{
			// 0
			type: 'sticky',
			heightNum: 3,
			scrollHeight: 0,
			objs: {
				container: document.querySelector('#scroll-section-0'),
                messageA : document.querySelector('#scroll-section-0 .main-message.a'),
                messageB : document.querySelector('#scroll-section-0 .main-message.b'),
                messageC : document.querySelector('#scroll-section-0 .main-message.c'),
			},
			values: {
                messageB_opacity_in: [0, 1, { start: 0.3, end: 0.3 }],
                messageC_opacity_in: [0, 1, { start: 0.6, end: 0.6 }],
                messageA_opacity_out: [1, 0, { start: 0.25, end: 0.3 }],
                messageB_opacity_out: [1, 0, { start: 0.45, end: 0.6 }],
                messageC_opacity_out: [1, 0, { start: 0.65, end: 0.9 }],
			}
		},
		{
			// 1
			type: 'normal',
			scrollHeight: 0,
			objs: {
				container: document.querySelector('#scroll-section-1'),
			}
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
				container: document.querySelector('#scroll-section-4'),
			}
		},
		{
			// 5
			type: 'normal',
			scrollHeight: 0,
			objs: {
				container: document.querySelector('#scroll-section-5'),
			}
		},
        {
			// 6
			type: 'normal',
			scrollHeight: 0,
			objs: {
				container: document.querySelector('#scroll-section-6'),
			}
		},
        {
			// 7
			type: 'normal',
			scrollHeight: 0,
			objs: {
				container: document.querySelector('#scroll-section-7'),
			}
		},
	
	];
    function checkMenu() {
		if (yOffset > 10) {
			document.body.classList.add('local-nav-sticky');
		} else {
			document.body.classList.remove('local-nav-sticky');
		}
	}

    function setLayout(){
        //각 스크롤 섹션의 높이 세팅
        for(let i = 0; i < sceneInfo.length; i++){
            //type = 'sticky', 'normal' 의 높이값 설정
            if(sceneInfo[i].type === 'sticky'){
                sceneInfo[i].scrollHeight = sceneInfo[i].heightNum * window.innerHeight;
            } else if(sceneInfo[i].type === 'normal'){
                sceneInfo[i].scrollHeight = sceneInfo[i].objs.container.offsetHeight;
            }
            sceneInfo[i].objs.container.style.height = `${sceneInfo[i].scrollHeight}px`;
        }
        // main-message영역 높이값 때문에 설정함
        sceneInfo[0].objs.messageA.style.height = `${sceneInfo[currentScene].scrollHeight / 4}px`;
        sceneInfo[0].objs.messageB.style.height = `${sceneInfo[currentScene].scrollHeight / 4}px`;
        sceneInfo[0].objs.messageC.style.height = `${sceneInfo[currentScene].scrollHeight / 4}px`;
        // 페이지 새로고침 했을 경우나 중간부터 스크롤이 시작하는 경우에도 계속 currentScene값을 유지하기 위한 처리
        //totalScrollHeight값과 현재 스크롤 위치를 비교해서 break를 거는 것
        // 어느 부분에서 새로고침을 해도 show-scene-번호 id값이 들어가게 됨
        yOffset = window.pageYOffset;//setLayout 함수에서 쓰이는 yOffset
        let totalScrollHeight = 0;
        for(let i=0; i < sceneInfo.length; i++){
            totalScrollHeight += sceneInfo[i].scrollHeight;
            if(totalScrollHeight >= yOffset){
                currentScene = i;
                break;
            }
        }
        document.body.setAttribute('id', `show-scene-${currentScene}`);
        
    }
    // currentYOffset = 현재씬에서 얼마나 스크롤 됬는지
    function calcValues(values, currentYOffset){
        let rv;
        // 현재 씬(스크롤 섹션)에서 스크롤된 범위를 비율(0~1)로 구하기
        const scrollHeight = sceneInfo[currentScene].scrollHeight;
        const scrollRatio = currentYOffset / scrollHeight;
        if(values.length === 3){
            // start ~ end 사이에 애니메이션 실행 start,end값이 있는 경우만
            const partScrollStart = values[2].start * scrollHeight;
            const partScrollEnd = values[2].end * scrollHeight;
            const partScrollHeight = partScrollEnd - partScrollStart;
            if(currentYOffset >= partScrollStart && currentYOffset <= partScrollEnd){
                rv = (currentYOffset-partScrollStart) / partScrollHeight * (values[1] - values[0]) + values[0];
            } else if(currentYOffset < partScrollEnd){
                rv = values[0];
            } else if (currentYOffset > partScrollEnd){
                rv = values[1];
            }
            
        }else{
            rv = scrollRatio * (values[1] - values[0]) + values[0];
        }

        return rv;
    }

	function playAnimation(){
        const objs = sceneInfo[currentScene].objs;
        const values = sceneInfo[currentScene].values;
        const currentYOffset = yOffset - prevScrollHeight;
        const scrollHeight = sceneInfo[currentScene].scrollHeight;
        const scrollRatio = currentYOffset / scrollHeight;

		switch (currentScene) {
			case 0:
                if (scrollRatio <= 0.12) {
                    // in
                    objs.messageA.style.opacity = 1;
                } else {
                    // out
                    objs.messageA.style.opacity = calcValues(values.messageA_opacity_out, currentYOffset);
                }
                if (scrollRatio <= 0.52) {
                    // in
                    objs.messageB.style.opacity = calcValues(values.messageB_opacity_in, currentYOffset);
                } else {
                    // out
                    objs.messageB.style.opacity = calcValues(values.messageB_opacity_out, currentYOffset);
                }
                if (scrollRatio <= 0.62) {
                    // in
                    objs.messageC.style.opacity = calcValues(values.messageC_opacity_in, currentYOffset);
                } else {
                    // out
                    objs.messageC.style.opacity = calcValues(values.messageC_opacity_out, currentYOffset);
                }
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
		}
	}

	// 스크롤이 돌때마다 body에 show-scene-번호 id값 넣어줌
    function scrollLoop(){
        enterNewScene = false;//새로운 씬이 시작될때 0값이 -가 되는 것을 방지하기 위한 처리
        //prevScrollHeight = 페이지 전체의 스크롤 길이
        prevScrollHeight = 0;
        for (let i = 0; i < currentScene; i++){
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
        
        if (delayedYOffset < prevScrollHeight) {
			enterNewScene = true;
			// 브라우저 바운스 효과로 인해 마이너스가 되는 것을 방지(모바일)
			if (currentScene === 0) return;
			currentScene--;
			document.body.setAttribute('id', `show-scene-${currentScene}`);
		}
        
        if(enterNewScene) return; //새로운 씬이 시작될때 0값이 -가 되는 것을 방지하기 위한 처리
        playAnimation();
    }
    function loop() {
		delayedYOffset = delayedYOffset + (yOffset - delayedYOffset) * acc;

        // 일부 기기에서 페이지 끝으로 고속 이동하면 body id가 제대로 인식 안되는 경우를 해결
        // 페이지 맨 위로 갈 경우: scrollLoop와 첫 scene의 기본 캔버스 그리기 수행
        // if (delayedYOffset < 1) {
        //     scrollLoop();
        //     sceneInfo[0].objs.canvas.style.opacity = 1;
        // }
        // 페이지 맨 아래로 갈 경우: 마지막 섹션은 스크롤 계산으로 위치 및 크기를 결정해야할 요소들이 많아서 1픽셀을 움직여주는 것으로 해결
        if ((document.body.offsetHeight - window.innerHeight) - delayedYOffset < 1) {
            let tempYOffset = yOffset;
            scrollTo(0, tempYOffset - 1);
        }

		rafId = requestAnimationFrame(loop);

		if (Math.abs(yOffset - delayedYOffset) < 1) {
			cancelAnimationFrame(rafId);
			rafState = false;
		}
	}

    window.addEventListener('load', () => {
		setLayout(); // 중간에 새로고침 시, 콘텐츠 양에 따라 높이 계산에 오차가 발생하는 경우를 방지하기 위해 before-load 클래스 제거 전에도 확실하게 높이를 세팅하도록 한번 더 실행
        document.body.classList.remove('before-load');
        setLayout();

		// 중간에서 새로고침 했을 경우 자동 스크롤로 제대로 그려주기
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
  			checkMenu();

  			if (!rafState) {
  				rafId = requestAnimationFrame(loop);
  				rafState = true;
  			}
  		});

  		window.addEventListener('resize', () => {
  			if (window.innerWidth > 900) {
				window.location.reload();
			}
  		});

  		window.addEventListener('orientationchange', () => {
			scrollTo(0, 0);
			setTimeout(() => {
				window.location.reload();
			}, 500);
  		});

	});

})();
