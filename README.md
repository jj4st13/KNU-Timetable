# KNU-Timetable
강원대학교 시간표 작성기입니다.
테스트로 운영되고 있습니다.

### TODO
- 로그인 실패/가입 실패 페이지 디자인
- 시간표 개선 (학과/학년 등의 선택 기능, 교수 검색 기능 구현)
- 메인 페이지, 자유게시판, QnA 페이지 구현(XE?)

### 2015-10-02 지금까지의 커밋
- KNU-Timetable으로부터의 커밋(commit)
- DB 테이블 수정(/tools)
- DB 연결 부분 수정(KNU-Timetable으로부터)
- 각종 페이지 분리 및 register_check.php 생성 (KNU-Timetabe으로부터)

### 2015-08-24 DB로부터 테이블 정보 가져오기 구현
- PHP에서의 배열 사용 $var = array('a', 'b', ...); : https://opentutorials.org/course/779/4930
- 업데이트: db1.knu_lecture_data 테이블 채워넣음

### 2015-08-23 로그인 기능 확장, 시간표 구현
- jQuery를 이용한 iframe 자동 크기 조절 스크립트 추가:
http://tipsbox.tistory.com/entry/%EC%9E%90%EB%B0%94%EC%8A%A4%ED%81%AC%EB%A6%BD%ED%8A%B8-iframe-%EB%82%B4%EC%9A%A9%EC%97%90-%EB%94%B0%EB%9D%BC-%ED%81%AC%EA%B8%B0-%EC%9E%90%EB%8F%99-%EC%A1%B0%EC%A0%88

### 2015-08-21 일부 디자인 수정, 작성자 수정
세션 로그인의 가입 기능을 구현하고, 디자인 상 작성자를 수정했습니다.

### 2015-08-20 세션 로그인 구현
세션 로그인 기능을 구현했습니다. 다음은 참고문서 목록입니다.
- PHP 쿠키 로그인 구현: http://zetawiki.com/wiki/PHP_%EC%BF%A0%ED%82%A4_%EB%A1%9C%EA%B7%B8%EC%9D%B8_%EA%B5%AC%ED%98%84
- PHP MySQL 로그인 구현: http://kimttotto.tistory.com/24

### 2015-08-18 부트스트랩 테마
Zontal Admin 부트스트랩 테마를 사용합니다.
원본 테마: http://www.bootstrapzero.com/bootstrap-template/zontaladmin
