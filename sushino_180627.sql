/*
 Navicat Premium Data Transfer

 Source Server         : winddesign32.cafe24.com
 Source Server Type    : MySQL
 Source Server Version : 100113
 Source Host           : winddesign32.cafe24.com:3306
 Source Schema         : winddesign32

 Target Server Type    : MySQL
 Target Server Version : 100113
 File Encoding         : 65001

 Date: 27/06/2018 08:49:29
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for sb_admin
-- ----------------------------
DROP TABLE IF EXISTS `sb_admin`;
CREATE TABLE `sb_admin`  (
  `sba_idx` int(11) NOT NULL AUTO_INCREMENT,
  `sba_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `sba_pw` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `sba_rdate` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`sba_idx`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sb_admin
-- ----------------------------
INSERT INTO `sb_admin` VALUES (1, 'admin', '$2y$10$QMsnR7kGr8aTtoKc1zoZZeqFvvetLoEYNfeiaNrQpLKSI8Q44u.XO', '2018-02-26 16:00:00');

-- ----------------------------
-- Table structure for sb_application_board
-- ----------------------------
DROP TABLE IF EXISTS `sb_application_board`;
CREATE TABLE `sb_application_board`  (
  `sbab_idx` int(5) NOT NULL COMMENT 'application board pk',
  `sbab_cate` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'application setting(shopper, ftalk, pick)',
  `sbab_sdate` datetime(0) NULL DEFAULT NULL COMMENT '이벤트 시작',
  `sbab_edate` datetime(0) NULL DEFAULT NULL COMMENT '이벤트 종료',
  `sbab_lvl` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '접근 등급',
  `sbab_area` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '우리동네 설정',
  `sbab_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '신청 제목',
  `sbab_content` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '신청 내용',
  `sbab_limit` int(5) NULL DEFAULT NULL COMMENT '당첨자 정원',
  `sbab_rdate` datetime(0) NULL DEFAULT NULL COMMENT '등록 시간',
  `sbab_udate` datetime(0) NULL DEFAULT NULL COMMENT '수정 시간',
  `sbab_id` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '등록자',
  `sbab_ip` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '등록자IP',
  `sbab_hit` int(5) NOT NULL DEFAULT 0 COMMENT 'hit count',
  PRIMARY KEY (`sbab_idx`, `sbab_cate`) USING BTREE,
  INDEX `sbsp_INDEX`(`sbab_idx`, `sbab_rdate`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of sb_application_board
-- ----------------------------
INSERT INTO `sb_application_board` VALUES (1, 'shopper', '2018-06-15 00:00:00', '2018-06-23 23:59:59', '1', 'A', '미스테리 쇼퍼 일반회원, 서울 강남', 'ㅈㄷㄹㅈㄷㄹㅈㄷㄹㅈㄷㄹㄷㄹㅇㅇㅇㅇㅇㅇ', 10, '2018-06-14 12:38:46', '2018-06-14 14:33:21', '', '14.32.121.97', 2);
INSERT INTO `sb_application_board` VALUES (2, 'shopper', '2018-06-14 00:00:00', '2018-06-29 23:59:59', '91', 'A', '미스테리 쇼퍼!!', 'etststsetset', 9, '2018-06-14 12:51:06', NULL, '', '14.32.121.97', 2);
INSERT INTO `sb_application_board` VALUES (3, 'shopper', '2018-06-14 00:00:00', '2018-06-24 23:59:59', '1', '부산 강서구', '미스테리 쇼퍼!! 부산부산', '123123123123123', 9, '2018-06-14 12:54:06', NULL, '', '14.32.121.97', 0);
INSERT INTO `sb_application_board` VALUES (4, 'ftalk', '2018-06-14 00:00:00', '2018-06-23 23:59:59', '', '대구 수성구', '스시노 미식회 대구', '123123123123123', 20, '2018-06-14 13:07:44', NULL, '', '14.32.121.97', 0);
INSERT INTO `sb_application_board` VALUES (5, 'ftalk', '2018-06-14 00:00:00', '2018-06-29 23:59:59', '', 'A', '스시노 미식회 전체 가즈아', '123123123123123가즉아', 15, '2018-06-14 13:09:18', NULL, '', '14.32.121.97', 4);
INSERT INTO `sb_application_board` VALUES (6, 'pick', '2018-06-14 00:00:00', '2018-06-29 23:59:59', '', '서울 강남구', '서울 강남 체험단 모집합니다', '으아아아아아 가즈아아아아', 8, '2018-06-14 13:18:05', NULL, '', '14.32.121.97', 1);

-- ----------------------------
-- Table structure for sb_application_member
-- ----------------------------
DROP TABLE IF EXISTS `sb_application_member`;
CREATE TABLE `sb_application_member`  (
  `sbabm_idx` bigint(5) NOT NULL COMMENT 'primary',
  `sbabm_fidx` bigint(5) NULL DEFAULT NULL COMMENT '이벤트 아이디',
  `sbabm_mb_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '신청자 ID',
  `sbabm_cate` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'application type',
  `sbabm_option2` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'option2',
  `sbabm_option3` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'option3',
  `sbabm_option4` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'option4',
  `sbabm_option5` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'option5',
  `sbabm_rdate` datetime(0) NOT NULL COMMENT '신청날짜',
  `sbabm_adate` datetime(0) NULL DEFAULT NULL COMMENT '당첨된 날짜',
  PRIMARY KEY (`sbabm_idx`, `sbabm_mb_id`) USING BTREE,
  INDEX `SBSPM_INDEX`(`sbabm_idx`, `sbabm_rdate`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of sb_application_member
-- ----------------------------
INSERT INTO `sb_application_member` VALUES (1, 6, 'test1', 'pick', '', '', '', 'Y', '2018-06-14 15:55:34', '2018-06-15 15:57:07');
INSERT INTO `sb_application_member` VALUES (2, 4, 'test19', 'ftalk', '', '', '', 'Y', '2018-06-15 17:26:35', '2018-06-15 17:26:35');
INSERT INTO `sb_application_member` VALUES (3, 4, 'test18', 'ftalk', '', '', '', 'Y', '2018-06-15 17:26:35', '2018-06-15 17:26:35');
INSERT INTO `sb_application_member` VALUES (4, 6, 'test2', 'pick', '', '', '', '', '2018-06-14 15:55:34', NULL);
INSERT INTO `sb_application_member` VALUES (5, 4, 'test17', 'ftalk', '', '', '', 'Y', '2018-06-15 17:26:35', '2018-06-15 17:26:35');
INSERT INTO `sb_application_member` VALUES (6, 6, 'test3', 'pick', '', '', '', '', '2018-06-14 15:55:34', NULL);
INSERT INTO `sb_application_member` VALUES (7, 4, 'test16', 'ftalk', '', '', '', 'Y', '2018-06-15 17:26:35', '2018-06-15 17:26:35');
INSERT INTO `sb_application_member` VALUES (8, 6, 'test4', 'pick', '', '', '', '', '2018-06-14 15:55:34', NULL);
INSERT INTO `sb_application_member` VALUES (9, 4, 'test15', 'ftalk', '', '', '', 'Y', '2018-06-15 17:26:35', '2018-06-15 17:26:35');
INSERT INTO `sb_application_member` VALUES (10, 6, 'test5', 'pick', '', '', '', '', '2018-06-14 15:55:34', NULL);
INSERT INTO `sb_application_member` VALUES (11, 4, 'test14', 'ftalk', '', '', '', 'Y', '2018-06-15 17:26:35', '2018-06-15 17:26:35');
INSERT INTO `sb_application_member` VALUES (12, 6, 'test6', 'pick', '', '', '', '', '2018-06-14 15:55:34', NULL);
INSERT INTO `sb_application_member` VALUES (13, 4, 'test13', 'ftalk', '', '', '', 'Y', '2018-06-15 17:26:35', '2018-06-15 17:26:35');
INSERT INTO `sb_application_member` VALUES (14, 6, 'test7', 'pick', '', '', '', '', '2018-06-14 15:55:34', NULL);
INSERT INTO `sb_application_member` VALUES (15, 4, 'test12', 'ftalk', '', '', '', 'Y', '2018-06-15 17:26:35', '2018-06-15 17:26:35');
INSERT INTO `sb_application_member` VALUES (16, 6, 'test8', 'pick', '', '', '', '', '2018-06-14 15:55:34', NULL);
INSERT INTO `sb_application_member` VALUES (17, 4, 'test11', 'ftalk', '', '', '', 'Y', '2018-06-15 17:26:35', '2018-06-15 17:26:35');
INSERT INTO `sb_application_member` VALUES (18, 6, 'test9', 'pick', '', '', '', '', '2018-06-14 15:55:34', NULL);
INSERT INTO `sb_application_member` VALUES (19, 6, 'test10', 'pick', '', '', '', 'Y', '2018-06-14 15:55:34', '2018-06-15 17:13:14');
INSERT INTO `sb_application_member` VALUES (20, 6, 'test11', 'pick', '', '', '', 'Y', '2018-06-14 15:55:34', '2018-06-15 17:13:14');
INSERT INTO `sb_application_member` VALUES (21, 6, 'test12', 'pick', '', '', '', 'Y', '2018-06-14 15:55:34', '2018-06-15 17:13:14');
INSERT INTO `sb_application_member` VALUES (22, 6, 'test13', 'pick', '', '', '', 'Y', '2018-06-14 15:55:34', '2018-06-15 17:13:14');
INSERT INTO `sb_application_member` VALUES (23, 6, 'test14', 'pick', '', '', '', 'Y', '2018-06-14 15:55:34', '2018-06-15 17:13:14');
INSERT INTO `sb_application_member` VALUES (24, 6, 'test15', 'pick', '', '', '', 'Y', '2018-06-14 15:55:34', '2018-06-15 17:13:14');
INSERT INTO `sb_application_member` VALUES (25, 6, 'test16', 'pick', '', '', '', 'Y', '2018-06-14 15:55:34', '2018-06-15 17:13:14');
INSERT INTO `sb_application_member` VALUES (26, 6, 'test18', 'pick', '', '', '', 'Y', '2018-06-14 15:55:34', '2018-06-15 17:13:14');
INSERT INTO `sb_application_member` VALUES (27, 2, 'test1', 'shopper', '', '', '', '', '2018-06-14 20:48:10', NULL);
INSERT INTO `sb_application_member` VALUES (28, 6, 'test19', 'pick', '', '', '', 'Y', '2018-06-15 17:22:42', '2018-06-15 17:22:42');
INSERT INTO `sb_application_member` VALUES (29, 6, 'test17', 'pick', '', '', '', 'Y', '2018-06-15 17:22:42', '2018-06-15 17:22:42');
INSERT INTO `sb_application_member` VALUES (30, 1, 'test2', 'shopper', '', '', '', '', '2018-06-15 13:53:57', NULL);
INSERT INTO `sb_application_member` VALUES (31, 5, 'test3', 'ftalk', '', '', '', '', '2018-06-15 13:57:08', NULL);
INSERT INTO `sb_application_member` VALUES (32, 3, 'test19', 'shopper', '', '', '', 'Y', '2018-06-15 17:31:30', '2018-06-15 17:31:30');
INSERT INTO `sb_application_member` VALUES (33, 3, 'test18', 'shopper', '', '', '', 'Y', '2018-06-15 17:31:30', '2018-06-15 17:31:30');
INSERT INTO `sb_application_member` VALUES (34, 3, 'test17', 'shopper', '', '', '', 'Y', '2018-06-15 17:31:30', '2018-06-15 17:31:30');
INSERT INTO `sb_application_member` VALUES (35, 3, 'test16', 'shopper', '', '', '', 'Y', '2018-06-15 17:31:30', '2018-06-15 17:31:30');
INSERT INTO `sb_application_member` VALUES (36, 3, 'test15', 'shopper', '', '', '', 'Y', '2018-06-15 17:31:30', '2018-06-15 17:31:30');
INSERT INTO `sb_application_member` VALUES (37, 3, 'test14', 'shopper', '', '', '', 'Y', '2018-06-15 17:31:30', '2018-06-15 17:31:30');
INSERT INTO `sb_application_member` VALUES (38, 3, 'test13', 'shopper', '', '', '', 'Y', '2018-06-15 17:31:30', '2018-06-15 17:31:30');
INSERT INTO `sb_application_member` VALUES (39, 3, 'test12', 'shopper', '', '', '', 'Y', '2018-06-15 17:31:31', '2018-06-15 17:31:31');
INSERT INTO `sb_application_member` VALUES (40, 3, 'test11', 'shopper', '', '', '', 'Y', '2018-06-15 17:31:31', '2018-06-15 17:31:31');
INSERT INTO `sb_application_member` VALUES (41, 3, 'test10', 'shopper', '', '', '', 'Y', '2018-06-15 17:31:31', '2018-06-15 17:31:31');
INSERT INTO `sb_application_member` VALUES (42, 4, 'test3', 'ftalk', '', '', '', 'Y', '2018-06-17 10:14:32', '2018-06-17 10:14:32');

-- ----------------------------
-- Table structure for sb_application_notice_board
-- ----------------------------
DROP TABLE IF EXISTS `sb_application_notice_board`;
CREATE TABLE `sb_application_notice_board`  (
  `sbab_idx` int(5) NOT NULL COMMENT 'application board pk',
  `sbab_cate` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'application setting(shopper, ftalk, pick)',
  `sbab_sdate` datetime(0) NULL DEFAULT NULL COMMENT '이벤트 시작',
  `sbab_edate` datetime(0) NULL DEFAULT NULL COMMENT '이벤트 종료',
  `sbab_lvl` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '접근 등급',
  `sbab_area` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '우리동네 설정',
  `sbab_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '신청 제목',
  `sbab_content` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '신청 내용',
  `sbab_hit` int(5) NOT NULL DEFAULT 0 COMMENT '당첨자 정원',
  `sbab_rdate` datetime(0) NULL DEFAULT NULL COMMENT '등록 시간',
  `sbab_udate` datetime(0) NULL DEFAULT NULL COMMENT '수정 시간',
  `sbab_id` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '등록자',
  `sbab_ip` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '등록자IP',
  PRIMARY KEY (`sbab_idx`, `sbab_cate`) USING BTREE,
  INDEX `sbsp_INDEX`(`sbab_idx`, `sbab_rdate`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of sb_application_notice_board
-- ----------------------------
INSERT INTO `sb_application_notice_board` VALUES (1, '', NULL, NULL, NULL, '서울 강남구', '공지사항 이지롱!!! 공지사항 이지롱!!! 공지사항 이지롱!!! 공지사항 이지롱!!! 공지사항 이지롱!!!', '<br><div><table style=\"box-sizing: border-box; word-break: break-word; text-size-adjust: none; margin: 0px; padding: 0px; border: 0px; width: 1601px; border-collapse: collapse; border-spacing: 0px; font-size: 14px; line-height: inherit; color: rgb(104, 115, 132); font-family: &quot;Nanum Gothic&quot;, dotum, sans-serif;\"><tbody style=\"box-sizing: border-box; word-break: break-word; text-size-adjust: none; margin: 0px; padding: 0px; border: 0px;\"><tr style=\"box-sizing: border-box; word-break: break-word; text-size-adjust: none; margin: 0px; padding: 0px; border-width: 1px 0px 0px; border-top-style: solid; border-right-style: initial; border-bottom-style: initial; border-left-style: initial; border-top-color: rgb(232, 232, 232); border-right-color: initial; border-bottom-color: initial; border-left-color: initial; border-image: initial;\"><td style=\"box-sizing: border-box; word-break: break-word; text-size-adjust: none; margin: 0px; padding: 10px 20px; border: 0px;\">공지사항 이지롱!!! 공지사항 이지롱!!! 공지사항 이지롱!!! 공지사항 이지롱!!! 공지사항 이지롱!!!</td></tr></tbody></table></div>', 1, '2018-06-14 16:55:30', NULL, '', '14.32.121.97');
INSERT INTO `sb_application_notice_board` VALUES (2, '', NULL, NULL, NULL, '서울 강남구', '미스테리 쇼퍼 일반회원, 서울 강남', 'sdsd', 1, '2018-06-14 16:55:58', NULL, '', '14.32.121.97');
INSERT INTO `sb_application_notice_board` VALUES (3, '', NULL, NULL, NULL, '서울 강남구', '미스테리 쇼퍼!!', 'sbsdbsdb', 1, '2018-06-14 16:56:03', NULL, '', '14.32.121.97');
INSERT INTO `sb_application_notice_board` VALUES (4, '', NULL, NULL, NULL, '서울 강남구', '관리자에서 등록 ㅔㅌ스트ㅈㄷㄹㅈㄷㄹㅈㄷㄹ', 'sbsdbsdb', 1, '2018-06-14 16:56:10', NULL, '', '14.32.121.97');

-- ----------------------------
-- Table structure for sb_business
-- ----------------------------
DROP TABLE IF EXISTS `sb_business`;
CREATE TABLE `sb_business`  (
  `sbb_idx` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `sbb_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sbb_hp` varchar(13) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sbb_email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sbb_aria` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sbb_aria2` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sbb_contents` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sbb_store` int(11) NOT NULL,
  `sbb_use` int(11) NOT NULL,
  `sbb_rdate` datetime(0) NOT NULL,
  PRIMARY KEY (`sbb_idx`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 27 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of sb_business
-- ----------------------------
INSERT INTO `sb_business` VALUES (5, '태스트1kjs', '01022642246', 'kjaw3r@naver.com', '4', '남구', '하나둘셋 123 @#@!$!@', 1, 1, '2018-02-28 09:12:58');
INSERT INTO `sb_business` VALUES (6, 'testhong', '0103315548', 'kjsqwe@h.net', '', '시/군/구 선택', '', 1, 1, '2018-02-28 09:14:51');
INSERT INTO `sb_business` VALUES (7, '1234123', '01022344487', 'hongsi@asdf.net', '', '시/군/구 선택', 'asdf', 1, 1, '2018-02-28 09:17:02');
INSERT INTO `sb_business` VALUES (8, '테스트두번째', '01054687456', 'kjasdfqw@nate.com', '', '시/군/구 선택', 'safwer23', 2, 2, '2018-02-28 09:18:24');
INSERT INTO `sb_business` VALUES (9, '하나둜셋', '01055487896', 'kj2f@hotmail.com', '4', '북구', 'w wef', 1, 1, '2018-02-28 09:19:12');
INSERT INTO `sb_business` VALUES (10, 'hlasdf', '0195248789', 'kj2f@naver.com', '12', '익산시', 'asdf !@#!@동해물과백asdf !@#!@동해물과백asdf !@#!@동해물과백asdf !@#!@동해물과백asdf !@#!@동해물과백asdf !@#!@동해물과백asdf !@#!@동해물과백asdf !@#!@동해물과백asdf !@#!@동해물과백asdf !@#!@동해물과백asdf !@#!@동해물과백asdf !@#!@동해물과백asdf !@#!@동해물과백asdf !@#!@동해물과백asdf !@#!@동해물과백asdf !@#!@동해물과백asdf !@#!@동해물과백asdf !@#!@동해물과백asdf !@#!@동해물과백asdf !@#!@동해물과백asdf !@#!@동해물과백asdf !@#!@동해물과백asdf !@#!@동해물과백asdf !@#!@동해물과백asdf !@#!@동해물과백asdf !@#!@동해물과백asdf !@#!@동해물과백asdf !@#!@동해물과백asdf !@#!@동해물과백asdf !@#!@동해물과백asdf !@#!@동해물과백asdf !@#!@동해물과백asdf !@#!@동해물과백asdf !@#!@동해물과백asdf !@#!@동해물과백asdf !@#!@동해물과백asdf !@#!@동해물과백asdf !@#!@동해물과백asdf !@#!@동해물과백asdf !@#!@동해물과백asdf !@#!@동해물과백asdf !@#!@동해물과백asdf !@#!@동해물과백asdf !@#!@동해물과백asdf !@#!@동해물과백asdf !@#!@동해물과백asdf !@#!@동해물과백asdf !@#!@동해물과백asdf !@#!@동해물과백asdf !@#!@동해물과백asdf !@#!@동해물과백asdf !@#!@동해물과백asdf !@#!@동해물과백asdf !@#!@동해물과백asdf !@#!@동해물과백asdf !@#!@동해물과백asdf !@#!@동해물과백asdf !@#!@동해물과백asdf !@#!@동해물과백asdf !@#!@동해물과백asdf !@#!@동해물과백asdf !@#!@동해물과백', 1, 1, '2018-02-28 09:20:18');
INSERT INTO `sb_business` VALUES (11, '하나둘', '01022475547', 'kjsqwe@korea.net', '3', '계양구', 'asdf 2 sdfa', 1, 1, '2018-02-28 09:21:41');
INSERT INTO `sb_business` VALUES (12, '가나다라', '0105542347', 'kjsqw123@naver.com', '', '시/군/구 선택', 'asdfawsfwe', 1, 1, '2018-02-28 09:24:08');
INSERT INTO `sb_business` VALUES (13, '가나다라', '0105542347', 'kjsqw123@naver.com', '', '시/군/구 선택', 'asdfawsfwe', 1, 1, '2018-02-28 09:24:34');
INSERT INTO `sb_business` VALUES (14, '가나다라', '0105542347', 'kjsqw123@naver.com', '', '시/군/구 선택', 'asdfawsfwe', 1, 1, '2018-02-28 09:24:36');
INSERT INTO `sb_business` VALUES (15, '테스팅', '01025487357', 'wikqweuf@honda.com', '3', '부평구', 'asedfwefwe', 1, 1, '2018-02-28 09:25:48');
INSERT INTO `sb_business` VALUES (16, '테스팅', '01025487357', 'wikqweuf@honda.com', '3', '부평구', 'asedfwefwe', 1, 1, '2018-02-28 09:27:46');
INSERT INTO `sb_business` VALUES (17, '테스팅', '01025487357', 'wikqweuf@honda.com', '3', '부평구', 'asedfwefwe', 1, 1, '2018-02-28 09:27:48');
INSERT INTO `sb_business` VALUES (18, '가나다', '01054457747', 'kjs@naver.com', '', '시/군/구 선택', 'asdf', 1, 1, '2018-02-28 09:32:00');
INSERT INTO `sb_business` VALUES (19, '테스트123', '01022454487', 'jsh@naver.com', '', '시/군/구 선택', 'aSDfasFD', 1, 1, '2018-02-28 09:34:43');
INSERT INTO `sb_business` VALUES (20, '테스트 하나둘', '01022467572', 'jkse@naver.com', '', '시/군/구 선택', 'sdafasfwe한다둘', 1, 1, '2018-02-28 09:39:36');
INSERT INTO `sb_business` VALUES (22, '09시44분 테스트', '01054573324', 'kjs@naver.com', '', '시/군/구 선택', 'asdfwef', 1, 1, '2018-02-28 09:43:43');
INSERT INTO `sb_business` VALUES (23, '09시44분 테스트 2차', '01022457789', 'kjasdf@nate.com', '13', '곡성군', 'sdfqwaefasgkasdg', 2, 2, '2018-02-28 09:44:30');
INSERT INTO `sb_business` VALUES (25, '123123', '01012341234', 'crash@co.kr', '1', '금정구', '123123', 2, 1, '2018-03-09 17:50:25');
INSERT INTO `sb_business` VALUES (26, '강호동', '01045457894', 'cc@cc.kr', '3', '계양구', 'asdasdasd', 2, 2, '2018-03-09 17:51:09');

-- ----------------------------
-- Table structure for sb_customer
-- ----------------------------
DROP TABLE IF EXISTS `sb_customer`;
CREATE TABLE `sb_customer`  (
  `sbc_idx` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `sbc_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sbc_hp` varchar(13) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sbc_email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sbc_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sbc_contents` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sbc_file` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sbc_rdate` datetime(0) NOT NULL,
  `sbc_udate` datetime(0) NOT NULL,
  PRIMARY KEY (`sbc_idx`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of sb_customer
-- ----------------------------
INSERT INTO `sb_customer` VALUES (1, '홍길동', '010-1234-1234', 'wind@hotmail.com', '테스트', '테스트지로옹~~~~~~~~~~~~~~~~~~', '', '2018-05-02 14:29:06', '2018-05-02 14:29:06');

-- ----------------------------
-- Table structure for sb_dongnae_set
-- ----------------------------
DROP TABLE IF EXISTS `sb_dongnae_set`;
CREATE TABLE `sb_dongnae_set`  (
  `sb_idx` int(5) NOT NULL COMMENT '동네 고유 idx',
  `sb_dong_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '동네 이름',
  `sb_dong_cate` int(5) NOT NULL COMMENT '동네 체크 id',
  PRIMARY KEY (`sb_idx`) USING BTREE,
  INDEX `IDX_DONG`(`sb_idx`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for sb_email_list
-- ----------------------------
DROP TABLE IF EXISTS `sb_email_list`;
CREATE TABLE `sb_email_list`  (
  `sb_idx` int(5) NOT NULL COMMENT '고유값',
  `sbe_idx` int(5) NULL DEFAULT NULL COMMENT '대체값',
  `sb_email_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '메일 제목',
  `sb_email_content` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '메일 내용',
  `sb_email_send_lvl` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '받는이 레벨',
  `sb_email_send_mb` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '받는이 ID',
  `sb_email_w_date` datetime(0) NOT NULL COMMENT '메일 작성 날짜',
  `sb_email_send_date` datetime(0) NOT NULL COMMENT '메일 발송 날짜',
  `sb_email_delete_flag` int(5) NULL DEFAULT NULL COMMENT '메일 삭제 플래그',
  PRIMARY KEY (`sb_idx`) USING BTREE,
  INDEX `SB_EMAIL_INDEX`(`sb_idx`, `sb_email_w_date`, `sb_email_send_date`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of sb_email_list
-- ----------------------------
INSERT INTO `sb_email_list` VALUES (1, 1, '가나다라ㅏㅏ라라라wefwefwefwefwef', '<b>ㅈㄷㄹㅈㄷㄹㅈㄷㄹㅈㄷㄹㅈㄷㄹㅈㄷㄹ</b>', 'test1, test2', '직접입력', '2018-05-15 13:39:46', '2018-05-15 13:39:47', NULL);
INSERT INTO `sb_email_list` VALUES (2, 2, '가나다라ㅏㅏ라라라wefwefwefwefwef', 'ㅈㄷㄹㅈㄷㄹㅈㄷㄹㅈㄷㄹ', 'test1, test2', '직접입력', '2018-05-15 13:42:11', '2018-05-15 13:42:11', NULL);
INSERT INTO `sb_email_list` VALUES (3, 3, '가나다라ㅏㅏ라라라wefwefwefwefwef', 'ㅈㄷㄹㅈㄷㄹㅈㄷㄹㅈㄷㄹ', 'test1, test2', '직접입력', '2018-05-15 13:42:12', '2018-05-15 13:42:12', NULL);
INSERT INTO `sb_email_list` VALUES (4, 4, '가나다라ㅏㅏ라라라wefwefwefwefwef', 'ㅈㄷㄹㅈㄷㄹㅈㄷㄹㅈㄷㄹ', 'test1, test2', '직접입력', '2018-05-15 13:42:33', '2018-05-15 13:42:33', NULL);
INSERT INTO `sb_email_list` VALUES (5, 5, '가나다라ㅏㅏ라라라wefwefwefwefwef', '<b>ㅈㄷㄹㅈㄷㄹㅈㄷㅈㄷㄹ</b>', 'test1, test2', '직접입력', '2018-05-15 13:44:18', '2018-05-15 13:44:18', NULL);
INSERT INTO `sb_email_list` VALUES (6, 6, '가나다라ㅏㅏ라라라wefwefwefwefwef', '<b>ㅈㄷㄹㅈㄷㄹㅈㄷㅈㄷㄹ</b>', 'test1, test2', '직접입력', '2018-05-15 13:44:44', '2018-05-15 13:44:44', NULL);
INSERT INTO `sb_email_list` VALUES (7, 7, '가나다라ㅏㅏ라라라wefwefwefwefwef', '<b>ㅈㄷㄹㅈㄷㄹㅈㄷㅈㄷㄹ</b>', 'test1, test2', '직접입력', '2018-05-15 13:45:16', '2018-05-15 13:45:16', NULL);
INSERT INTO `sb_email_list` VALUES (8, 8, '가나다라ㅏㅏ라라라wefwefwefwefwef', '<b>ㅈㄷㄹㅈㄷㄹㅈㄷㅈㄷㄹ</b>', 'test1, test2', '직접입력', '2018-05-15 13:46:01', '2018-05-15 13:46:01', NULL);
INSERT INTO `sb_email_list` VALUES (9, 9, '가나다라ㅏㅏ라라라wefwefwefwefwef', '<b>ㅈㄷㄹㅈㄷㄹㅈㄷㅈㄷㄹ</b>', 'test1, test2', '직접입력', '2018-05-15 13:46:13', '2018-05-15 13:46:13', NULL);
INSERT INTO `sb_email_list` VALUES (10, 10, '가나다라ㅏㅏ라라라wefwefwefwefwef', '<b>ㅈㄷㄹㅈㄷㄹㅈㄷㅈㄷㄹ</b>', 'test1, test2', '직접입력', '2018-05-15 13:46:17', '2018-05-15 13:46:18', NULL);
INSERT INTO `sb_email_list` VALUES (11, 11, '점주 테스트', '<u>점줌점주점주점주점주저무</u>', '90', '레벨설정', '2018-05-15 13:48:50', '2018-05-15 13:48:50', NULL);
INSERT INTO `sb_email_list` VALUES (12, 12, '아이디 클릭 후 메일 발송 테스트', '123412341234', 'test1,test3,test9,', '직접입력', '2018-05-15 16:24:16', '2018-05-15 16:24:16', NULL);
INSERT INTO `sb_email_list` VALUES (13, 13, '레벨설정(일반회원)', '가나다라라마마마마', '1', '레벨설정', '2018-05-15 16:33:34', '2018-05-15 16:33:34', NULL);
INSERT INTO `sb_email_list` VALUES (14, 14, 'ㅅㄷㄴㅅㄴㄷㅅㄴㄷ', '<img src=\\\"/data/editor/아리아퍼니쳐_DB_realIP.png\\\" title=\\\"아리아퍼니쳐_DB_realIP.png\\\"><br style=\\\"clear:both;\\\"><br>', 'test1,test2', '직접입력', '2018-05-15 16:49:24', '2018-05-15 16:49:24', NULL);
INSERT INTO `sb_email_list` VALUES (15, 15, '이미지 테스트', '<img src=\\\"http://winddesign32.cafe24.com/data/editor/아리아퍼니쳐_DB_realIP.png\\\" title=\\\"아리아퍼니쳐_DB_realIP.png\\\"><br style=\\\"clear:both;\\\"><br>', 'test1,test2', '직접입력', '2018-05-15 17:03:27', '2018-05-15 17:03:27', NULL);
INSERT INTO `sb_email_list` VALUES (16, 16, 'ㅅㄷㄴㅅㄴㅅㄴㅅ', '<img src=\\\"http://winddesign32.cafe24.com/data/editor/아리아퍼니쳐_DB_realIP.png\\\" title=\\\"아리아퍼니쳐_DB_realIP.png\\\"><br style=\\\"clear:both;\\\"><br>', 'test1,test2', '직접입력', '2018-05-15 17:05:07', '2018-05-15 17:05:07', NULL);
INSERT INTO `sb_email_list` VALUES (17, 17, 'ㅅㄷㄴㅅ', 'ㄴㄷㅅㄴㄷㅅ<img src=\\\"http://winddesign32.cafe24.com/data/editor/아리아퍼니쳐_DB_realIP.png\\\" title=\\\"아리아퍼니쳐_DB_realIP.png\\\"><br style=\\\"clear:both;\\\">', 'test1,test2', '직접입력', '2018-05-15 17:06:55', '2018-05-15 17:06:55', NULL);
INSERT INTO `sb_email_list` VALUES (18, 18, 'test', 'stsetsetset<img src=\\\"http://winddesign32.cafe24.com/data/editor/editor_1526542445\\\" title=\\\"editor_1526542445\\\"><br style=\\\"clear:both;\\\">', 'test1,test2', '직접입력', '2018-05-17 16:34:21', '2018-05-17 16:34:21', NULL);
INSERT INTO `sb_email_list` VALUES (19, 19, 'testset', 'setsetsetset', '서울 강남구', '우리동네', '2018-06-19 09:18:06', '2018-06-19 09:18:06', NULL);

-- ----------------------------
-- Table structure for sb_event
-- ----------------------------
DROP TABLE IF EXISTS `sb_event`;
CREATE TABLE `sb_event`  (
  `sbe_idx` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `sbe_sdate` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '이벤트 시작일',
  `sbe_edate` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '이벤트 종료일',
  `sbe_idate` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '작성일 직접등록',
  `sbe_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sbe_contents` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sbe_file` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sbe_rdate` datetime(0) NOT NULL COMMENT '작성일 서버시간',
  `sbe_udate` datetime(0) NOT NULL COMMENT '수정일 서버시간',
  PRIMARY KEY (`sbe_idx`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for sb_ftalk_board
-- ----------------------------
DROP TABLE IF EXISTS `sb_ftalk_board`;
CREATE TABLE `sb_ftalk_board`  (
  `sbf_idx` int(5) NOT NULL COMMENT '스시노미식회 idx',
  `sbf_sdate` datetime(0) NULL DEFAULT NULL COMMENT '이벤트 시작',
  `sbf_edate` datetime(0) NULL DEFAULT NULL COMMENT '이벤트 종료',
  `sbf_lvl` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '접근 등급',
  `sbf_area` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '우리동네 설정',
  `sbf_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '스시노미식회 제목',
  `sbf_content` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '스시노미식회 내용',
  `sbf_rdate` datetime(0) NULL DEFAULT NULL COMMENT '등록 시간',
  `sbf_udate` datetime(0) NULL DEFAULT NULL COMMENT '수정 시간',
  `sbf_id` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '등록 ID',
  `sbf_ip` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '등록 IP',
  PRIMARY KEY (`sbf_idx`) USING BTREE,
  INDEX `sbf_INDEX`(`sbf_idx`, `sbf_rdate`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of sb_ftalk_board
-- ----------------------------
INSERT INTO `sb_ftalk_board` VALUES (1, '2018-06-14 00:00:00', '2018-06-23 23:59:59', NULL, '서울 강남구', '스시노 미식회 일반회원, 서울 강남', '123ㄴㄹㄴㅇㄹ23ㄹ2ㄹㅇㄴㄴㅇㄹㄴㅇㄹㄴㅇㄹㄴ', '2018-06-14 11:35:40', NULL, 'admin', '14.32.121.97');

-- ----------------------------
-- Table structure for sb_ftalk_member
-- ----------------------------
DROP TABLE IF EXISTS `sb_ftalk_member`;
CREATE TABLE `sb_ftalk_member`  (
  `sbfm_idx` bigint(5) NOT NULL COMMENT 'primary',
  `sbfm_fidx` bigint(5) NULL DEFAULT NULL COMMENT '이벤트 id',
  `sbfm_mb_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '신청자 ID',
  `sbfm_option1` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'option1',
  `sbfm_option2` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'option2',
  `sbfm_option3` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'option3',
  `sbfm_option4` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'option4',
  `sbfm_option5` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'option5',
  `sbfm_rdate` datetime(0) NULL DEFAULT NULL COMMENT '신청날짜',
  PRIMARY KEY (`sbfm_idx`, `sbfm_mb_id`) USING BTREE,
  INDEX `SBSPM_INDEX`(`sbfm_idx`, `sbfm_rdate`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for sb_invite_admin
-- ----------------------------
DROP TABLE IF EXISTS `sb_invite_admin`;
CREATE TABLE `sb_invite_admin`  (
  `sbia_idx` bigint(5) NOT NULL COMMENT 'pk',
  `sbia_sdate` datetime(0) NULL DEFAULT NULL COMMENT '이벤트 시작일',
  `sbia_edate` datetime(0) NULL DEFAULT NULL COMMENT '이벤트 종료일',
  `sbia_prize_rate1` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `sbia_prize_rate2` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '배율2',
  `sbia_prize_option1` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '1등당첨자 수||경품',
  `sbia_prize_option2` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '2등당첨자 수||경품',
  `sbia_prize_option3` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '3등당첨자 수||경품',
  `sbia_prize_option4` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '4등당첨자 수||경품',
  `sbia_prize_option5` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '5등당첨자 수||경품',
  `sbia_prize_option6` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '기타 옵션',
  `sbia_rdate` datetime(0) NULL DEFAULT NULL COMMENT '등록일',
  `sbia_write` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '등록자',
  `sbia_ip` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '등록자 ip',
  PRIMARY KEY (`sbia_idx`) USING BTREE,
  INDEX `SIA_INDEX`(`sbia_idx`, `sbia_rdate`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of sb_invite_admin
-- ----------------------------
INSERT INTO `sb_invite_admin` VALUES (1, '2018-06-21 00:00:00', '2018-06-29 23:59:59', '10', '100', '10||15만원 초대권', '10||10만원 초대권 ', '30||5만원 초대권', '20||3만원 초대권', NULL, NULL, '2018-06-19 14:35:27', 'admin', '14.32.121.97');

-- ----------------------------
-- Table structure for sb_invite_member
-- ----------------------------
DROP TABLE IF EXISTS `sb_invite_member`;
CREATE TABLE `sb_invite_member`  (
  `sbi_idx` bigint(5) NOT NULL COMMENT 'primary',
  `sbi_fidx` bigint(5) NULL DEFAULT NULL COMMENT '이벤트 아이디',
  `sbi_mb_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '함께갈래요 ID',
  `sbi_cate` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'application type',
  `sbi_option` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '옵션1',
  `sbi_option2` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'option2',
  `sbi_option3` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'option3',
  `sbi_option4` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'option4',
  `sbi_option5` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'option5',
  `sbi_rdate` datetime(0) NULL DEFAULT NULL COMMENT '신청날짜',
  `sbi_adate` datetime(0) NULL DEFAULT NULL COMMENT '당첨된 날짜',
  PRIMARY KEY (`sbi_idx`, `sbi_mb_id`) USING BTREE,
  INDEX `SBSPM_INDEX`(`sbi_idx`, `sbi_rdate`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of sb_invite_member
-- ----------------------------
INSERT INTO `sb_invite_member` VALUES (2, 4, 'test4', 'invite', '', '1', NULL, NULL, NULL, '2018-06-18 15:24:17', '2018-06-18 15:24:17');
INSERT INTO `sb_invite_member` VALUES (3, 1, 'test1', 'invite', '', '2', NULL, NULL, NULL, '2018-06-18 15:24:17', '2018-06-18 15:24:17');
INSERT INTO `sb_invite_member` VALUES (4, 2, 'test2', 'invite', '', '3', NULL, NULL, NULL, '2018-06-18 15:24:17', '2018-06-18 15:24:17');
INSERT INTO `sb_invite_member` VALUES (5, 5, 'test5', 'invite', '', '4', NULL, NULL, NULL, '2018-06-18 15:24:17', '2018-06-18 15:24:17');
INSERT INTO `sb_invite_member` VALUES (6, 6, 'test6', 'invite', '', '1', NULL, NULL, NULL, '2018-06-18 15:24:17', '2018-06-18 15:24:17');
INSERT INTO `sb_invite_member` VALUES (7, 7, 'test7', 'invite', '', '2', NULL, NULL, NULL, '2018-06-18 15:24:17', '2018-06-18 15:24:17');
INSERT INTO `sb_invite_member` VALUES (8, 8, 'test8', 'invite', '', '3', NULL, NULL, NULL, '2018-06-18 15:24:17', '2018-06-18 15:24:17');
INSERT INTO `sb_invite_member` VALUES (9, 9, 'test9', 'invite', '', '4', NULL, NULL, NULL, '2018-06-18 15:24:17', '2018-06-18 15:24:17');
INSERT INTO `sb_invite_member` VALUES (10, 10, 'test10', 'invite', '', '1', NULL, NULL, NULL, '2018-06-18 15:24:17', '2018-06-18 15:24:17');
INSERT INTO `sb_invite_member` VALUES (11, 11, 'test11', 'invite', '', '2', NULL, NULL, NULL, '2018-06-18 15:24:17', '2018-06-18 15:24:17');
INSERT INTO `sb_invite_member` VALUES (12, 19, 'test19', 'invite', 'test3', '', '1', NULL, NULL, '2018-06-19 14:29:18', '2018-06-19 14:29:18');
INSERT INTO `sb_invite_member` VALUES (13, 3, 'test3', 'invite', '', '', '1', NULL, NULL, '2018-06-25 14:09:40', '2018-06-25 14:09:40');

-- ----------------------------
-- Table structure for sb_member
-- ----------------------------
DROP TABLE IF EXISTS `sb_member`;
CREATE TABLE `sb_member`  (
  `sb_idx` int(5) NOT NULL COMMENT '회원 번호 primary key',
  `sb_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '회원 ID',
  `sb_password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '회원 pwd',
  `sb_mem_level` int(10) NULL DEFAULT 1 COMMENT '멤버 레벨',
  `sb_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '회원 이름',
  `sb_phone` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '회원 핸드폰 번호',
  `sb_email` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '회원 이메일',
  `sb_sex` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '회원 성별',
  `sb_birth` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '회원 생년월일',
  `sb_zipcode` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '우편번호',
  `sb_addr1` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '주소1',
  `sb_addr2` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '주소2',
  `sb_dongnae` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '우리동네 설정',
  `sb_blog_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '블로그 주소',
  `sb_signin_ip` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '회원 가입 IP',
  `sb_regdate` datetime(0) NOT NULL COMMENT '회원 가입 날짜',
  `sb_delete_flag` int(5) NULL DEFAULT NULL COMMENT '멤버 삭제 flag',
  PRIMARY KEY (`sb_idx`, `sb_id`) USING BTREE,
  INDEX `IDX_MEM_ID`(`sb_idx`, `sb_regdate`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of sb_member
-- ----------------------------
INSERT INTO `sb_member` VALUES (1, 'test1', '$2y$10$tQgi/G95bsZBZH3xBmfURuVFQr1h/vHl3g2gX5qcZukTPSa7KnveO', 1, 'test1', '010-2517-4882', 'skymanla@naver.com', 'female', '--', '63308', '제주특별자치도 제주시 첨단로 12', '가나다라마바사', '서울 노원구', '', '14.32.121.97', '2018-06-12 16:10:43', NULL);
INSERT INTO `sb_member` VALUES (2, 'test2', '$2y$10$tQgi/G95bsZBZH3xBmfURuVFQr1h/vHl3g2gX5qcZukTPSa7KnveO', 1, 'test2', '010-1111-2222', 'skymanla@naver.com', 'female', '--', '', '', '', '서울 강남구', '', '14.32.121.97', '2018-06-12 16:10:43', NULL);
INSERT INTO `sb_member` VALUES (3, 'test3', '$2y$10$tQgi/G95bsZBZH3xBmfURuVFQr1h/vHl3g2gX5qcZukTPSa7KnveO', 1, 'test3', '010-2517-4882', 'skymanla@naver.com', 'female', '--', '63275', '제주특별자치도 제주시 가령골길 1', '1234', '대구 북구', '', '14.32.121.97', '2018-06-12 16:10:43', NULL);
INSERT INTO `sb_member` VALUES (4, 'test4', '$2y$10$tQgi/G95bsZBZH3xBmfURuVFQr1h/vHl3g2gX5qcZukTPSa7KnveO', 1, 'test4', '010-1111-2222', 'skymanla@naver.com', 'female', '--', '', '', '', '대구 수성구', '', '14.32.121.97', '2018-06-12 16:10:43', NULL);
INSERT INTO `sb_member` VALUES (5, 'test5', '$2y$10$tQgi/G95bsZBZH3xBmfURuVFQr1h/vHl3g2gX5qcZukTPSa7KnveO', 1, 'test5', '010-2517-4882', 'skymanla@naver.com', 'female', '--', '', '', '', '서울 강남구', '', '14.32.121.97', '2018-06-12 16:10:43', NULL);
INSERT INTO `sb_member` VALUES (6, 'test6', '$2y$10$tQgi/G95bsZBZH3xBmfURuVFQr1h/vHl3g2gX5qcZukTPSa7KnveO', 1, 'test6', '010-1111-2222', 'skymanla@naver.com', 'female', '--', '', '', '', '서울 강남구', '', '14.32.121.97', '2018-06-12 16:10:43', NULL);
INSERT INTO `sb_member` VALUES (7, 'test7', '$2y$10$tQgi/G95bsZBZH3xBmfURuVFQr1h/vHl3g2gX5qcZukTPSa7KnveO', 1, 'test7', '010-2517-4882', 'skymanla@naver.com', 'female', '--', '', '', '', '서울 강남구', '', '14.32.121.97', '2018-06-12 16:10:43', NULL);
INSERT INTO `sb_member` VALUES (8, 'test8', '$2y$10$tQgi/G95bsZBZH3xBmfURuVFQr1h/vHl3g2gX5qcZukTPSa7KnveO', 1, 'test8', '010-1111-2222', 'skymanla@naver.com', 'female', '--', '', '', '', '서울 강남구', '', '14.32.121.97', '2018-06-12 16:10:43', NULL);
INSERT INTO `sb_member` VALUES (9, 'test9', '$2y$10$tQgi/G95bsZBZH3xBmfURuVFQr1h/vHl3g2gX5qcZukTPSa7KnveO', 1, 'test9', '010-2517-4882', 'skymanla@naver.com', 'female', '--', '', '', '', '서울 강남구', '', '14.32.121.97', '2018-06-12 16:10:43', NULL);
INSERT INTO `sb_member` VALUES (10, 'test10', '$2y$10$tQgi/G95bsZBZH3xBmfURuVFQr1h/vHl3g2gX5qcZukTPSa7KnveO', 1, 'test10', '010-1111-2222', 'skymanla@naver.com', 'female', '--', '', '', '', '서울 강남구', '', '14.32.121.97', '2018-06-12 16:10:43', NULL);
INSERT INTO `sb_member` VALUES (11, 'test11', '$2y$10$tQgi/G95bsZBZH3xBmfURuVFQr1h/vHl3g2gX5qcZukTPSa7KnveO', 1, 'test11', '010-2517-4882', 'skymanla@naver.com', 'female', '--', '', '', '', '서울 강남구', '', '14.32.121.97', '2018-06-12 16:10:43', NULL);
INSERT INTO `sb_member` VALUES (12, 'test12', '$2y$10$tQgi/G95bsZBZH3xBmfURuVFQr1h/vHl3g2gX5qcZukTPSa7KnveO', 1, 'test12', '010-1111-2222', 'skymanla@naver.com', 'female', '--', '', '', '', '서울 강남구', '', '14.32.121.97', '2018-06-12 16:10:43', NULL);
INSERT INTO `sb_member` VALUES (13, 'test13', '$2y$10$tQgi/G95bsZBZH3xBmfURuVFQr1h/vHl3g2gX5qcZukTPSa7KnveO', 1, 'test13', '010-2517-4882', 'skymanla@naver.com', 'female', '--', '', '', '', '서울 강남구', '', '14.32.121.97', '2018-06-12 16:10:43', NULL);
INSERT INTO `sb_member` VALUES (14, 'test14', '$2y$10$tQgi/G95bsZBZH3xBmfURuVFQr1h/vHl3g2gX5qcZukTPSa7KnveO', 1, 'test14', '010-1111-2222', 'skymanla@naver.com', 'female', '--', '', '', '', '서울 강남구', '', '14.32.121.97', '2018-06-12 16:10:43', NULL);
INSERT INTO `sb_member` VALUES (15, 'test15', '$2y$10$tQgi/G95bsZBZH3xBmfURuVFQr1h/vHl3g2gX5qcZukTPSa7KnveO', 1, 'test15', '010-2517-4882', 'skymanla@naver.com', 'female', '--', '', '', '', '서울 강남구', '', '14.32.121.97', '2018-06-12 16:10:43', NULL);
INSERT INTO `sb_member` VALUES (16, 'test16', '$2y$10$tQgi/G95bsZBZH3xBmfURuVFQr1h/vHl3g2gX5qcZukTPSa7KnveO', 1, 'test16', '010-1111-2222', 'skymanla@naver.com', 'female', '--', '', '', '', '서울 강남구', '', '14.32.121.97', '2018-06-12 16:10:43', NULL);
INSERT INTO `sb_member` VALUES (17, 'test17', '$2y$10$tQgi/G95bsZBZH3xBmfURuVFQr1h/vHl3g2gX5qcZukTPSa7KnveO', 1, 'test17', '010-2517-4882', 'skymanla@naver.com', 'female', '--', '', '', '', '서울 강남구', '', '14.32.121.97', '2018-06-12 16:10:43', NULL);
INSERT INTO `sb_member` VALUES (18, 'test18', '$2y$10$tQgi/G95bsZBZH3xBmfURuVFQr1h/vHl3g2gX5qcZukTPSa7KnveO', 1, 'test18', '010-1111-2222', 'skymanla@naver.com', 'female', '--', '', '', '', '서울 강남구', '', '14.32.121.97', '2018-06-12 16:10:43', NULL);
INSERT INTO `sb_member` VALUES (19, 'test19', '$2y$10$tQgi/G95bsZBZH3xBmfURuVFQr1h/vHl3g2gX5qcZukTPSa7KnveO', 1, 'test19', '010-2517-4882', 'skymanla@naver.com', 'female', '--', '', '', '', '서울 강남구', '', '14.32.121.97', '2018-06-12 16:10:43', NULL);

-- ----------------------------
-- Table structure for sb_member_level
-- ----------------------------
DROP TABLE IF EXISTS `sb_member_level`;
CREATE TABLE `sb_member_level`  (
  `sb_idx` int(5) NOT NULL COMMENT '고유값',
  `sb_level_cate` int(5) NULL DEFAULT NULL COMMENT '레벨 매칭 값',
  `sb_level_title` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '레벨명',
  PRIMARY KEY (`sb_idx`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sb_member_level
-- ----------------------------
INSERT INTO `sb_member_level` VALUES (1, 1, '일반회원');
INSERT INTO `sb_member_level` VALUES (2, 91, 'VIP');
INSERT INTO `sb_member_level` VALUES (3, 90, '점주');

-- ----------------------------
-- Table structure for sb_notice
-- ----------------------------
DROP TABLE IF EXISTS `sb_notice`;
CREATE TABLE `sb_notice`  (
  `sbn_idx` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `sbn_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sbn_contents` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sbn_file` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sbn_count` int(11) NOT NULL,
  `sbn_rdate` datetime(0) NOT NULL,
  `sbn_udate` datetime(0) NOT NULL,
  PRIMARY KEY (`sbn_idx`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of sb_notice
-- ----------------------------
INSERT INTO `sb_notice` VALUES (6, '테스트 공지사항1', '테스트 공지사항1', '', 6, '2018-02-27 20:32:43', '2018-02-27 20:32:43');
INSERT INTO `sb_notice` VALUES (7, '테스트 공지사항2', '테스트 공지사항2', '', 6, '2018-02-27 20:32:50', '2018-02-27 20:33:16');
INSERT INTO `sb_notice` VALUES (8, '테스트 공지사항2', '테스트 공지사항2', '', 7, '2018-02-27 20:33:00', '2018-02-27 20:33:00');
INSERT INTO `sb_notice` VALUES (9, '테스트 공지사항4', '<br>', '', 16, '2018-02-27 20:33:07', '2018-02-27 20:33:07');
INSERT INTO `sb_notice` VALUES (10, '테스트 공지사항5', '테스트 공지사항5', '', 57, '2018-02-27 20:33:27', '2018-02-27 22:15:54');
INSERT INTO `sb_notice` VALUES (11, 'asd', 'asdasd', '', 0, '2018-05-09 13:19:45', '2018-05-09 13:19:45');
INSERT INTO `sb_notice` VALUES (12, 'asda', 'asdasd', '', 1, '2018-05-09 13:22:06', '2018-05-09 13:22:06');
INSERT INTO `sb_notice` VALUES (13, 'asda', 'asdasdad', '', 3, '2018-05-09 13:22:34', '2018-05-09 13:22:34');
INSERT INTO `sb_notice` VALUES (14, 'asd', 'asdasdasdad', '', 3, '2018-05-09 13:22:45', '2018-05-09 13:22:45');
INSERT INTO `sb_notice` VALUES (15, 'ㅅㄷㄴㅅㄴㄷㅅㄴㄷㅅㄴㄷㅅ', '<img src=\"/data/editor/아리아퍼니쳐_DB_realIP.png\" title=\"아리아퍼니쳐_DB_realIP.png\"><br style=\"clear:both;\"><br>', '', 21, '2018-05-15 16:51:54', '2018-05-15 16:51:54');

-- ----------------------------
-- Table structure for sb_pick_board
-- ----------------------------
DROP TABLE IF EXISTS `sb_pick_board`;
CREATE TABLE `sb_pick_board`  (
  `sbp_idx` int(5) NOT NULL COMMENT '체험단 idx',
  `sbp_sdate` datetime(0) NULL DEFAULT NULL COMMENT '이벤트 시작',
  `sbp_edate` datetime(0) NULL DEFAULT NULL COMMENT '이벤트 종료',
  `sbp_lvl` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '접근 등급',
  `sbp_area` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '우리동네 설정',
  `sbp_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '체험단 제목',
  `sbp_content` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '체험단 내용',
  `sbp_rdate` datetime(0) NULL DEFAULT NULL COMMENT '등록 시간',
  `sbp_udate` datetime(0) NULL DEFAULT NULL COMMENT '수정 시간',
  `sbp_id` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '등록 ID',
  `sbp_ip` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '등록 IP',
  PRIMARY KEY (`sbp_idx`) USING BTREE,
  INDEX `SBP_INDEX`(`sbp_idx`, `sbp_rdate`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of sb_pick_board
-- ----------------------------
INSERT INTO `sb_pick_board` VALUES (1, '2018-06-14 00:00:00', '2018-06-22 23:59:59', NULL, '서울 강남구', '체험단 등록 서울 강남구', '123123123123', '2018-06-14 12:14:52', NULL, 'admin', '14.32.121.97');

-- ----------------------------
-- Table structure for sb_pick_member
-- ----------------------------
DROP TABLE IF EXISTS `sb_pick_member`;
CREATE TABLE `sb_pick_member`  (
  `sbpm_idx` bigint(5) NOT NULL COMMENT 'primary',
  `sbpm_fidx` bigint(5) NULL DEFAULT NULL COMMENT '이벤트 id',
  `sbpm_mb_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '신청자 ID',
  `sbpm_option1` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'option1',
  `sbpm_option2` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'option2',
  `sbpm_option3` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'option3',
  `sbpm_option4` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'option4',
  `sbpm_option5` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'option5',
  `sbpm_rdate` datetime(0) NULL DEFAULT NULL COMMENT '신청날짜',
  PRIMARY KEY (`sbpm_idx`, `sbpm_mb_id`) USING BTREE,
  INDEX `SBSPM_INDEX`(`sbpm_idx`, `sbpm_rdate`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for sb_shopper_board
-- ----------------------------
DROP TABLE IF EXISTS `sb_shopper_board`;
CREATE TABLE `sb_shopper_board`  (
  `sbsp_idx` int(5) NOT NULL COMMENT '미스테리쇼퍼 idx',
  `sbsp_sdate` datetime(0) NULL DEFAULT NULL COMMENT '이벤트 시작',
  `sbsp_edate` datetime(0) NULL DEFAULT NULL COMMENT '이벤트 종료',
  `sbsp_lvl` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '접근 등급',
  `sbsp_area` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '우리동네 설정',
  `sbsp_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '미스테리쇼퍼 제목',
  `sbsp_content` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '미스테리쇼퍼 내용',
  `sbsp_rdate` datetime(0) NULL DEFAULT NULL COMMENT '등록 시간',
  `sbsp_udate` datetime(0) NULL DEFAULT NULL COMMENT '수정 시간',
  `sbsp_id` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '등록자',
  `sbsp_ip` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '등록자IP',
  PRIMARY KEY (`sbsp_idx`) USING BTREE,
  INDEX `sbsp_INDEX`(`sbsp_idx`, `sbsp_rdate`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of sb_shopper_board
-- ----------------------------
INSERT INTO `sb_shopper_board` VALUES (1, '2018-06-12 00:00:00', '2018-06-13 23:59:59', 'A', 'A', '미스테리 쇼퍼!!', '13123123', '2018-06-12 19:15:40', NULL, 'admin', '14.32.121.97');
INSERT INTO `sb_shopper_board` VALUES (2, '2018-06-14 00:00:00', '2018-06-21 23:59:59', '1', '서울 강남구', '미스테리 쇼퍼 일반회원, 서울 강남', '123123123123sdfsdfsdfsdfsdfsdfsdfsdfsdf', '2018-06-14 11:08:33', '2018-06-14 11:26:32', 'admin', '14.32.121.97');
INSERT INTO `sb_shopper_board` VALUES (3, '2018-06-15 00:00:00', '2018-06-23 23:59:59', '', '서울 강남구', '스시노 미식회 작성 서울 강남구', 'ㅇ오오오오 미식회다아아ㅏㅇ아ㅏ', '2018-06-14 11:33:29', NULL, 'admin', '14.32.121.97');

-- ----------------------------
-- Table structure for sb_shopper_member
-- ----------------------------
DROP TABLE IF EXISTS `sb_shopper_member`;
CREATE TABLE `sb_shopper_member`  (
  `sbspm_idx` bigint(5) NOT NULL COMMENT 'primary',
  `sbspm_fidx` bigint(5) NULL DEFAULT NULL COMMENT '이벤트 아이디',
  `sbspm_mb_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '신청자 ID',
  `sbspm_option1` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'option1',
  `sbspm_option2` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'option2',
  `sbspm_option3` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'option3',
  `sbspm_option4` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'option4',
  `sbspm_option5` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'option5',
  `sbspm_rdate` datetime(0) NULL DEFAULT NULL COMMENT '신청날짜',
  PRIMARY KEY (`sbspm_idx`, `sbspm_mb_id`) USING BTREE,
  INDEX `SBSPM_INDEX`(`sbspm_idx`, `sbspm_rdate`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for sb_sms_list
-- ----------------------------
DROP TABLE IF EXISTS `sb_sms_list`;
CREATE TABLE `sb_sms_list`  (
  `sb_idx` int(5) NOT NULL COMMENT '고유값',
  `sbe_idx` int(5) NULL DEFAULT NULL COMMENT '대체값',
  `sb_sms_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '메일 제목',
  `sb_sms_content` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '메일 내용',
  `sb_sms_send_lvl` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '받는이 레벨',
  `sb_sms_send_mb` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '받는이 ID',
  `sb_sms_w_date` datetime(0) NOT NULL COMMENT '메일 작성 날짜',
  `sb_sms_send_date` datetime(0) NOT NULL COMMENT '메일 발송 날짜',
  `sb_sms_delete_flag` int(5) NULL DEFAULT NULL COMMENT '메일 삭제 플래그',
  PRIMARY KEY (`sb_idx`) USING BTREE,
  INDEX `sb_sms_INDEX`(`sb_idx`, `sb_sms_w_date`, `sb_sms_send_date`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of sb_sms_list
-- ----------------------------
INSERT INTO `sb_sms_list` VALUES (1, 1, '', '', 'test1,test2,test3', '직접입력', '2018-06-19 10:56:17', '2018-06-19 10:56:17', 1);
INSERT INTO `sb_sms_list` VALUES (2, 2, 'ㅈㄷㄹㅈㄷㄹ', 'ㅈㄷㄹㅈㄷㄹㅈㄷㄹㅈㄷㄹㄷㅈㄹ', 'test1,test2,test3', '직접입력', '2018-06-19 10:58:20', '2018-06-19 10:58:20', NULL);
INSERT INTO `sb_sms_list` VALUES (3, 3, 'ㅈㄷㄹㅈㄷㄹ', 'ㅈㄷㄹㅈㄷㄹㅈㄷㄹ', '1', '레벨설정', '2018-06-19 11:07:42', '2018-06-19 11:07:42', NULL);
INSERT INTO `sb_sms_list` VALUES (4, 4, 'ㅈㄷㄹㅈㄷㄹㅈㄷㄹ', 'ㅈㄷㄹㅈㄷㄹㅈㄷㄹ', '서울 강남구', '우리동네', '2018-06-19 11:11:51', '2018-06-19 11:11:51', NULL);
INSERT INTO `sb_sms_list` VALUES (5, 5, 'ㅅㄷㄴㅅㄴㅅㄴㄷㅅ', '가나다라가나다라가나다라가나다라가나다라가나다라가나다라가나다라가나다라가나다라가나다라가나다라가나다라가나다라가나다라가나다라가나다라가나다라가나다라가나다라가나다라가나다라가나다라가나다라가나다라가나다라가나다라가나다라가나다라가나다라가나다라가나다라가나다라가나다라가나다라가나다라가나다라가나다라가나다라가나다라가나다라가나다라가나다라가나다라가나다라가나다라가나다라가나다라가나다라가나다라가나다라가나다라가나다라가나다라가나다라가나다라가나다라가나다라가나다라가나다라가나다라가나다라가나다라가나다라가나다라', 'test1', '직접입력', '2018-06-19 11:36:52', '2018-06-19 11:36:52', NULL);
INSERT INTO `sb_sms_list` VALUES (6, 6, 'ㅅㄷㄴㅅㄴㅅㄴㄷㅅ', '장문테스트장문테스트장문테스트장문테스트장문테스트장문테스트장문테스트장문테스트장문테스트장문테스트장문테스트장문테스트장문테스트장문테스트장문테스트장문테스트장문테스트장문테스트장문테스트장문테스트장문테스트장문테스트장문테스트장문테스트장문테스트장문테스트장문테스트장문테스트장문테스트장문테스트장문테스트장문테스트장문테스트', 'test1', '직접입력', '2018-06-19 12:36:06', '2018-06-19 12:36:06', NULL);
INSERT INTO `sb_sms_list` VALUES (7, 7, 'ㅅㄷㄴㅅㄴㅅㄴㄷㅅ', '장문테스트장문테스트장문테스트장문테스트장문테스트장문테스트장문테스트장문테스트장문테스트장문테스트장문테스트장문테스트장문테스트장문테스트장문테스트장문테스트장문테스트장문테스트장문테스트장문테스트장문테스트', 'test1', '직접입력', '2018-06-19 12:48:32', '2018-06-19 12:48:32', NULL);
INSERT INTO `sb_sms_list` VALUES (8, 8, 'ㅅㄷㄴㅅㄴㅅㄴㄷㅅ', '<embed src=\\\"http://winddesign32.cafe24.com/data/editor/editor_1529381880\\\">', 'test1', '직접입력', '2018-06-19 13:39:33', '2018-06-19 13:39:33', NULL);

-- ----------------------------
-- Table structure for sb_store
-- ----------------------------
DROP TABLE IF EXISTS `sb_store`;
CREATE TABLE `sb_store`  (
  `sbs_idx` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `sbs_no` int(11) NOT NULL DEFAULT 0,
  `sbs_series` varchar(6) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sbs_type` int(11) NOT NULL,
  `sbs_new` int(11) NOT NULL,
  `sbs_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sbs_tel` varchar(13) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sbs_link1` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sbs_link2` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sbs_zip` varchar(6) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sbs_address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sbs_address2` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sbs_rdate` datetime(0) NOT NULL,
  `sbs_option` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '상점 부가서비스',
  `sbs_op_p` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '주차 정보',
  `sbs_op_q1` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '배달지역',
  `sbs_op_q2` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  PRIMARY KEY (`sbs_idx`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 92 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of sb_store
-- ----------------------------
INSERT INTO `sb_store` VALUES (1, 0, '7S', 3, 1, '강남역본점', '02-565-0802', 'https://store.naver.com/restaurants/detail?id=33695645', '/page/s3/s4.php', '06128', '서울 강남구 강남대로100길 13 (역삼동)', '서울 강남구 역삼동 619-5', '2018-02-27 11:07:27', NULL, NULL, NULL, NULL);
INSERT INTO `sb_store` VALUES (2, 0, '5S', 1, 1, '전북도청', '063-229-0802', 'https://store.naver.com/restaurants/detail?id=37459806', '', '54969', '전북 전주시 완산구 홍산3길 15 (효자동3가)', '전북 전주시 완산구 효자동3가 1527-3', '2018-02-27 11:07:27', 'q||p||gc', '매장 앞 4대 주차가능', '효자동,삼천동,중화산동', '');
INSERT INTO `sb_store` VALUES (3, 0, '3S', 1, 1, '익산모현', '063-842-0802', 'https://store.naver.com/restaurants/detail?id=35430809', '', '54654', '전북 익산시 배산로 161 (모현동1가)', '전북 익산시 모현동1가 858', '2018-02-27 11:07:27', 'q||gc', '', '갈산동,금강동,남중동,모현동,동산동,평화동,인화동,마동,목천동,송학동,배산지구,장신지구,중앙동,창인동,현영동', '18,000원 이상 주문가능,퀵비 2,000원 현장에서 현금결제');
INSERT INTO `sb_store` VALUES (4, 0, '3S', 1, 1, '군산수송', '063-466-0802', 'https://store.naver.com/restaurants/detail?id=37453070', '', '54091', '전북 군산시 동수송9길 1 (수송동)', '전북 군산시 수송동 848-7', '2018-02-27 11:07:27', NULL, NULL, NULL, NULL);
INSERT INTO `sb_store` VALUES (5, 0, '3S', 1, 1, '전주롯데', '063-276-0802', 'https://store.naver.com/restaurants/detail?id=36420662', '', '54946', '전북 전주시 완산구 온고을로 2 (서신동)', '전북 전주시 완산구 서신동 971', '2018-02-27 11:07:27', 'p', '백화점 지하주차장(무료이용가능)', '', '');
INSERT INTO `sb_store` VALUES (6, 0, '3S', 1, 1, '익산영등', '063-855-5802', 'https://store.naver.com/restaurants/detail?id=36351782', '', '54543', '전북 익산시 고봉로 319 (영등동)', '전북 익산시 영등동 385-15', '2018-02-27 11:07:27', NULL, NULL, NULL, NULL);
INSERT INTO `sb_store` VALUES (7, 0, '5S', 1, 1, '화성동탄', '031-8015-0862', 'https://store.naver.com/restaurants/detail?id=36412097', '', '18455', '경기 화성시 동탄중심상가1길 27 (반송동)', '경기 화성시 반송동 104-6', '2018-02-27 11:07:27', NULL, NULL, NULL, NULL);
INSERT INTO `sb_store` VALUES (8, 0, '5S', 1, 1, '노원롯데', '02-936-5802', 'https://store.naver.com/restaurants/detail?id=36628843', '', '01695', '서울 노원구 동일로 1414 (상계동)', '서울 노원구 상계동 713', '2018-02-27 11:07:27', NULL, NULL, NULL, NULL);
INSERT INTO `sb_store` VALUES (9, 0, '5S', 1, 1, '청주율량', '043-211-5802', 'https://store.naver.com/restaurants/detail?id=37114193', '', '28320', '충북 청주시 청원구 율량로 196 (율량동)', '충북 청주시 청원구 율량동 2049', '2018-02-27 11:07:27', 'q||p||r||gc', '지하주차장무료', '내덕동,사천동,우암동,율량동,주성동,주중동', '20,000원이상 배달가능');
INSERT INTO `sb_store` VALUES (10, 0, '5S', 1, 1, '대전탄방', '042-488-5802', 'https://store.naver.com/restaurants/detail?id=37005670', '', '35262', '대전 서구 계룡로553번길 72 (탄방동)', '대전 서구 탄방동 660', '2018-02-27 11:07:27', 'p||r||gc', '2시간 무료주차', '', '');
INSERT INTO `sb_store` VALUES (11, 0, '1S', 1, 1, '분당정자', '031-711-5802', 'https://store.naver.com/restaurants/detail?id=37269645', '', '13560', '경기 성남시 분당구 정자일로 135 (정자동)', '', '2018-02-27 10:12:36', NULL, NULL, NULL, NULL);
INSERT INTO `sb_store` VALUES (12, 0, '5S', 1, 1, '세종나성', '044-863-5802', 'https://store.naver.com/restaurants/detail?id=37286068', '', '30127', '세종특별자치시 한누리대로 253 (나성동)', '세종특별자치시 나성동 745', '2018-02-27 11:07:27', NULL, NULL, NULL, NULL);
INSERT INTO `sb_store` VALUES (13, 0, '5S', 1, 1, '대전노은', '042-825-6802', 'https://store.naver.com/restaurants/detail?id=37370400', '', '34086', '대전 유성구 은구비남로33번길 47-28 (지족동, 수가)', '대전 유성구 지족동 902-1', '2018-02-27 11:07:27', 'q||p||gc', '지하주차장무료', '노은동,지족동,반석동,죽동,하기동,덕명동,신성동,봉명동,장대동,궁동,구암동', '18,000원이상 배달/노은동,지족동,반석동,죽동,하기동-배달료1,000원/덕명동,신성동,봉명동,장대동,궁동,구암동-배달료2,000원');
INSERT INTO `sb_store` VALUES (14, 0, '3S', 1, 1, '인천청라', '032-565-5802', 'https://store.naver.com/restaurants/detail?id=37297258', '', '22736', '인천 서구 중봉대로612번길 10-8 (연희동)', '인천 서구 연희동 799-4', '2018-02-27 11:07:27', 'p||gc', '2시간 무료주차', '', '');
INSERT INTO `sb_store` VALUES (15, 0, '5S', 1, 1, '청주산남', '043-295-5802', 'https://store.naver.com/restaurants/detail?id=37441829', '', '28625', '충북 청주시 서원구 산남로70번길 31 (산남동)', '충북 청주시 서원구 산남동 574', '2018-02-27 11:07:27', 'q||p||r||gc', '하모니마트 뒷편 공영주차장', '산남동, 수곡동, 복대동(충북대까지), 사창동(일부지역), 개신동, 미평동, 사직동, 죽림동, 성화동, 분평동, 모충동 ', '20,000원 이상 배달, 배달료 2,000원');
INSERT INTO `sb_store` VALUES (16, 0, '1S', 1, 1, '수원영통', '031-204-5802', 'https://store.naver.com/restaurants/detail?id=37373634', '', '16705', '경기 수원시 영통구 청명남로34번길 21 (영통동)', '경기 수원시 영통구 영통동 1011-5', '2018-02-27 11:07:27', NULL, NULL, NULL, NULL);
INSERT INTO `sb_store` VALUES (17, 0, '1S', 1, 1, '수원천천', '031-269-5801', 'https://store.naver.com/restaurants/detail?id=37381526', '', '16323', '경기 수원시 장안구 정자로 39-1 (천천동)', '경기 수원시 장안구 천천동 481-6', '2018-02-27 11:07:27', 'q||gc', '', '천천동,율전동,정자동,파장동,이목동,송죽동,화서동', '20,000원 이상 배달 가능. ');
INSERT INTO `sb_store` VALUES (18, 0, '3S', 1, 1, '수원광교', '031-212-5802', 'https://store.naver.com/restaurants/detail?id=37410977', '', '16506', '경기 수원시 영통구 센트럴파크로127번길 95 (이의동)', '경기 수원시 영통구 이의동 1308-3', '2018-02-27 11:07:27', 'q||p||gc', '공영주차장 1시간', '반경 4km', '15,000원이상배달가능');
INSERT INTO `sb_store` VALUES (19, 0, '3S', 1, 1, '평택비전', '031-618-5802', 'https://store.naver.com/restaurants/detail?id=37448248', '', '17854', '경기 평택시 비전2로 196 (비전동)', '경기 평택시 비전동 1090-5', '2018-02-27 11:07:27', NULL, NULL, NULL, NULL);
INSERT INTO `sb_store` VALUES (20, 0, '3S', 1, 1, '안양범계', '031-388-5802', 'https://store.naver.com/restaurants/detail?id=37445739', '', '14072', '경기 안양시 동안구 평촌대로223번길 52 (호계동)', '', '2018-02-27 11:07:27', 'p||gc', '주변 공영주차장 이용', '', '');
INSERT INTO `sb_store` VALUES (21, 0, '5S', 1, 1, '원주혁신', '033-733-5802', 'https://store.naver.com/restaurants/detail?entry=plt&id=37467747', '', '26465', '강원 원주시 혁신로 37-1 (반곡동)', '강원 원주시 반곡동 1885-1', '2018-02-27 11:07:27', 'q||p||r||gc', '무료주차가능', '반곡동,개운동,관설동,명륜동,행구동,서곡리,수변공원', '지역별 거리별 배달료가 다르니 매장으로 문의');
INSERT INTO `sb_store` VALUES (22, 0, '5S', 1, 1, '남양주호평', '031-511-5802', 'https://store.naver.com/restaurants/detail?id=37490581', '', '12150', '경기 남양주시 호평로46번길 14 (호평동)', '경기 남양주시 호평동 642-2', '2018-02-27 11:07:27', NULL, NULL, NULL, NULL);
INSERT INTO `sb_store` VALUES (23, 0, '3S', 1, 1, '광주수완', '062-952-5802', 'https://store.naver.com/restaurants/detail?id=37534450', '', '62305', '광주 광산구 수완로 14 (수완동)', '광주 광산구 수완동 1767', '2018-02-27 11:07:27', 'q||p||r||gc', '무료주차가능', '수완동,장덕동,신가동,신창동,운남동,월곡동,우산동,하남동,산정동', '30,000원이상 주문시 무료배달 / 이하시 배달료3,000원부터');
INSERT INTO `sb_store` VALUES (24, 0, '7S', 1, 1, '구미진평', '054-476-5802', 'https://store.naver.com/restaurants/detail?id=37690703', '', '39411', '경북 구미시 인동36길 10 (진평동)', '경북 구미시 진평동 67-4', '2018-02-27 11:07:27', NULL, NULL, NULL, NULL);
INSERT INTO `sb_store` VALUES (25, 0, '1S', 1, 1, '충북혁신', '043-877-5802', 'https://store.naver.com/restaurants/detail?id=37611534', '', '27738', '충북 음성군 맹동면 대하4길 14', '충북 음성군 맹동면 두성리 1364', '2018-02-27 11:07:27', NULL, NULL, NULL, NULL);
INSERT INTO `sb_store` VALUES (26, 0, '3S', 1, 1, '용인동백', '031-548-1744', 'https://store.naver.com/restaurants/detail?id=37676874', '', '17006', '경기 용인시 기흥구 동백중앙로 283 (중동)', '경기 용인시 기흥구 중동 829', '2018-02-27 11:07:27', 'q||p||r||gc', '2시간 무료주차', '기흥구 동백동, 중동, 상하동, 청덕동', '배달료 포함');
INSERT INTO `sb_store` VALUES (27, 0, '7S', 1, 1, '안산고잔', '031-405-5802', 'https://store.naver.com/restaurants/detail?id=37677578', '', '15477', '경기 안산시 단원구 광덕대로 130 (고잔동)', '경기 안산시 단원구 고잔동 775', '2018-02-27 11:07:27', NULL, NULL, NULL, NULL);
INSERT INTO `sb_store` VALUES (28, 0, '7S', 1, 1, '김포구래', '031-985-5802', 'https://store.naver.com/restaurants/detail?id=37822765', '', '10071', '경기 김포시 김포한강4로 521 (구래동)', '경기 김포시 구래동 6880-5', '2018-02-27 11:07:27', NULL, NULL, NULL, NULL);
INSERT INTO `sb_store` VALUES (29, 0, '1S', 1, 1, '군산산북', '063-464-5802', 'https://store.naver.com/restaurants/detail?entry=plt&id=37841806', '', '54163', '전북 군산시 칠성안1길 44 (산북동)', '전북 군산시 산북동 3546-8', '2018-02-27 11:07:27', 'q||gc', '', '산북동, 소룡동, 미룡동, 나운동', '배달료 2,000원');
INSERT INTO `sb_store` VALUES (30, 0, '3S', 1, 1, '춘천석사', '033-261-5802', 'https://store.naver.com/restaurants/detail?entry=plt&id=37928162', '', '24415', '강원 춘천시 지석로 85 (석사동)', '강원 춘천시 석사동 888-4', '2018-02-27 11:07:27', 'q||p||gc', '무료주차가능', '춘천 전지역', '3km 무료배달');
INSERT INTO `sb_store` VALUES (31, 0, '3S', 1, 1, '수원인계', '031-234-5802', 'https://store.naver.com/restaurants/detail?id=37852014', '', '16490', '경기 수원시 팔달구 효원로265번길 46 (인계동)', '경기 수원시 팔달구 인계동 1113-7', '2018-02-27 11:07:27', 'q||p||r||gc', '지하주차장에 무료 주차 가능', '수원 대부분 지역(장안동,평동,이의동,신풍동,북수동 등 제외)', '배달업체가 배달 가능한 곳까지 배달 가능함');
INSERT INTO `sb_store` VALUES (32, 0, '3S', 1, 1, '군포산본', '031-396-5802', 'https://store.naver.com/restaurants/detail?id=37996747', '', '15802', '경기 군포시 고산로 683 (산본동)', '경기 군포시 산본동 1061-1', '2018-02-27 11:07:27', 'q||p||gc', '건물 뒷편 주차장 1시간 무료주차가능', '산본동,금정동,당정동,당동', '20,000원 이상 배달가능');
INSERT INTO `sb_store` VALUES (33, 0, '3S', 1, 1, '인천구월아시아드', '032-467-5802', 'https://store.naver.com/restaurants/detail?id=37882837', '', '21582', '인천 남동구 인하로 568 (구월동)', '인천 남동구 구월동 1533-2', '2018-02-27 11:07:27', 'q||p||r||gc', '2시간 무료주차', '남동구,남구,부평구(십정동)', '15,000원부터 배달가능,1km까지 무료배달,40,000만원이상시 전체지역무료배달');
INSERT INTO `sb_store` VALUES (34, 0, '3S', 1, 1, '대전관저', '042-543-0802', 'https://store.naver.com/restaurants/detail?id=37896448', '', '35382', '대전 서구 구봉로131번길 14-17 (관저동)', '대전 서구 관저동 1537', '2018-02-27 11:07:27', NULL, NULL, NULL, NULL);
INSERT INTO `sb_store` VALUES (35, 0, '1S', 1, 1, '용인신봉', '031-889-5801', 'https://store.naver.com/restaurants/detail?id=37925862', '', '16813', '경기 용인시 수지구 신봉2로 60 (신봉동)', '경기 용인시 수지구 신봉동 925', '2018-02-27 11:07:27', 'q||p||gc', '무료주차가능', '신봉동,풍덕천동,성복동,상현동,동천동', '신봉동 무료/풍덕천동 성복동 배달료 1,000원/상현동 동천동 배달료 2,000원');
INSERT INTO `sb_store` VALUES (36, 0, '1S', 1, 1, '의정부민락', '031-853-5803', 'https://store.naver.com/restaurants/detail?id=37925861', '', '11813', '경기 의정부시 오목로225번길 157 (민락동)', '경기 의정부시 민락동 809', '2018-02-27 11:07:27', NULL, NULL, NULL, NULL);
INSERT INTO `sb_store` VALUES (37, 0, '5S', 1, 1, '오산원동', '031-372-5805', 'https://store.naver.com/restaurants/detail?id=37925863', '', '18139', '경기 오산시 성호대로 130 (원동)', '경기 오산시 원동 811-8', '2018-02-27 11:07:27', NULL, NULL, NULL, NULL);
INSERT INTO `sb_store` VALUES (38, 0, '5S', 1, 1, '고양삼송', '02-381-5804', 'https://store.naver.com/restaurants/detail?id=37991731', '', '10568', '경기 고양시 덕양구 권율대로 885 (신원동)', '경기 고양시 덕양구 신원동 621-3', '2018-02-27 11:07:27', 'q||p||r||gc', '1시간30분 무료 주차', '삼송동,신원동,동산동,대자동,도내동,오금동,원흥동,지축동', '배달업체를 통한 거리별 배달료 발생/자가배달');
INSERT INTO `sb_store` VALUES (39, 0, '5S', 1, 1, '평택송탄', '031-668-5802', 'https://store.naver.com/restaurants/detail?id=37992480', '', '17739', '경기 평택시 정암로 126-30 (이충동)', '', '2018-02-27 11:07:27', 'p||r||gc', '', '', '');
INSERT INTO `sb_store` VALUES (40, 0, '3S', 1, 1, '구미옥계', '054-473-5803', 'https://store.naver.com/restaurants/detail?id=37996753', '', '39181', '경북 구미시 옥계북로 7 (옥계동)', '경북 구미시 옥계동 890-1', '2018-02-27 11:07:27', 'q||gc', '', '구미시 옥계동', '');
INSERT INTO `sb_store` VALUES (41, 0, '3S', 1, 1, '대구칠곡', '053-323-5802 ', 'https://store.naver.com/restaurants/detail?id=38252573', '', '41423', '대구 북구 동천로 126 (동천동)', '대구 북구 동천동 909-7', '2018-02-27 11:07:27', NULL, NULL, NULL, NULL);
INSERT INTO `sb_store` VALUES (42, 0, '3S', 1, 1, '위례우남', '031-721-5801', 'https://store.naver.com/restaurants/detail?id=38299395', '', '13647', '경기 성남시 수정구 위례서일로1길 28 (창곡동)', '경기 성남시 수정구 창곡동 539', '2018-02-27 11:07:27', 'q||p', '무료주차가능', '위례 전지역 및 문정,복정동 배달 가능', '20,000원이상 주문가능 / 배달료1,500원');
INSERT INTO `sb_store` VALUES (43, 0, '5S', 1, 1, '천안두정', '041-552-5801', 'https://store.naver.com/restaurants/detail?id=38264529', '', '31107', '충남 천안시 서북구 두정로 172 (두정동)', '충남 천안시 서북구 두정동 940', '2018-02-27 11:07:27', 'p||r||gc', '건물 뒷편 전용주차장 2시간 무료주차가능', '', '');
INSERT INTO `sb_store` VALUES (44, 0, '5S', 1, 1, '부산녹산', '051-972-5802', 'https://store.naver.com/restaurants/detail?id=38310064', '', '46735', '부산 강서구 화전산단4로19번길 26 (화전동)', '부산 강서구 화전동 555-1', '2018-02-27 11:07:27', NULL, NULL, NULL, NULL);
INSERT INTO `sb_store` VALUES (45, 0, '1S', 1, 1, '울산달동', '052-265-5801', 'https://store.naver.com/restaurants/detail?id=38314936', '', '44707', '울산 남구 삼산로 231 (달동)', '울산 남구 달동 1364-1', '2018-02-27 11:07:27', NULL, NULL, NULL, NULL);
INSERT INTO `sb_store` VALUES (46, 0, '3S', 1, 1, '시흥배곧', '031-432-5802', 'https://store.naver.com/restaurants/detail?id=38314937', '', '15010', '경기 시흥시 배곧3로 86 (정왕동)', '경기 시흥시 정왕동 2513-1', '2018-02-27 11:07:27', 'p||r||gc', '지하주차장무료', '', '');
INSERT INTO `sb_store` VALUES (47, 0, '3S', 1, 1, '서울마곡', '02-2666-5802', 'https://store.naver.com/restaurants/detail?id=38310071', '', '07599', '서울 강서구 방화대로 294 (마곡동)', '서울 강서구 마곡동 739-1', '2018-02-27 11:07:27', 'q||p||r', '4시간 무료주차가능', '마곡동, 신방화동, 내발산동', '배달료 3,000원   배달대행이용범위');
INSERT INTO `sb_store` VALUES (48, 0, '3S', 1, 1, '부산경성대', '051-612-5802', 'https://store.naver.com/restaurants/detail?id=38431404', '', '48434', '부산 남구 수영로 317 (대연동)', '부산 남구 대연동 73-45', '2018-02-27 11:07:27', NULL, NULL, NULL, NULL);
INSERT INTO `sb_store` VALUES (49, 0, '3S', 1, 1, '양산물금', '055-388-5802', 'https://store.naver.com/restaurants/detail?entry=plt&id=38494853', '', '50652', '경남 양산시 물금읍 부산대학로 156', '경남 양산시 물금읍 범어리 2782-4', '2018-02-27 11:07:27', NULL, NULL, NULL, NULL);
INSERT INTO `sb_store` VALUES (50, 0, '5S', 1, 1, '인천부평', '032-502-5802', 'https://store.naver.com/restaurants/detail?id=38484411', '', '21388', '인천 부평구 부흥로 264 (부평동)', '인천 부평구 부평동 529-40', '2018-02-27 11:07:27', NULL, NULL, NULL, NULL);
INSERT INTO `sb_store` VALUES (51, 0, '1S', 1, 1, '용인죽전', '031-276-5803', 'https://store.naver.com/restaurants/detail?id=556564265', '', '16869', '경기 용인시 수지구 용구대로 2701 (죽전동)', '경기 용인시 수지구 죽전동 1003-111', '2018-02-27 11:07:27', NULL, NULL, NULL, NULL);
INSERT INTO `sb_store` VALUES (52, 0, '1S', 1, 1, '서울대학로', '02-3673-5802', 'https://store.naver.com/restaurants/detail?id=38555311', '', '03085', '서울 종로구 동숭길 86 (동숭동)', '서울 종로구 동숭동 31-37', '2018-02-27 11:07:27', NULL, NULL, NULL, NULL);
INSERT INTO `sb_store` VALUES (53, 0, '5S', 1, 1, '하남미사', '031-796-5801', 'https://store.naver.com/restaurants/detail?id=1775174432', '', '12909', '경기 하남시 미사강변대로 212 (망월동)', '', '2018-02-27 11:07:27', 'q||p||r||gc', '1시간30분 무료주차가능', '하남시 강동구', '하남시 미사지구 강동구 강일동 부근  무료배달 ');
INSERT INTO `sb_store` VALUES (54, 0, '1S', 1, 1, '남양주별내', '031-529-5807', 'https://store.naver.com/restaurants/detail?id=38767227', '', '12105', '경기 남양주시 두물로39번길 1 (별내동)', '경기 남양주시 별내동 955-5', '2018-02-27 11:07:27', NULL, NULL, NULL, NULL);
INSERT INTO `sb_store` VALUES (55, 0, '5S', 1, 1, '김천혁신', '054-435-5802', 'https://store.naver.com/restaurants/detail?entry=plt&id=38655013', '', '39660', '경북 김천시 혁신3로 5 (율곡동)', '경북 김천시 율곡동 780', '2018-02-27 11:07:27', NULL, NULL, NULL, NULL);
INSERT INTO `sb_store` VALUES (56, 0, '7S', 1, 1, '고양원흥', '031-966-5802', 'https://store.naver.com/restaurants/detail?id=38628288', '', '10551', '경기 고양시 덕양구 도래울로 104 (도내동)', '경기 고양시 덕양구 도내동 964', '2018-02-27 11:07:27', NULL, NULL, NULL, NULL);
INSERT INTO `sb_store` VALUES (57, 0, '3S', 1, 1, '세종시청', '044-864-0038', 'https://store.naver.com/restaurants/detail?id=73428954', '', '30151', '세종특별자치시 시청대로 163 (보람동)', '세종특별자치시 보람동 626-2', '2018-02-27 11:07:27', NULL, NULL, NULL, NULL);
INSERT INTO `sb_store` VALUES (58, 0, '5S', 1, 1, '평택송담', '031-681-5805', 'https://store.naver.com/restaurants/detail?id=42974343', '', '17941', '경기 평택시 안중읍 안현로 322', '경기 평택시 안중읍 송담리 844-8', '2018-02-27 11:07:27', NULL, NULL, NULL, NULL);
INSERT INTO `sb_store` VALUES (59, 0, '3S', 1, 1, '은평뉴타운', '02-383-5801', 'https://store.naver.com/restaurants/detail?id=1537111519', '', '03311', '서울 은평구 통일로 1030 (진관동)', '서울 은평구 진관동 100', '2018-02-27 11:07:27', 'q||p||gc', '3시간 무료주차가능', '진관동, 갈현동1,2동, 불광2,3동', '진관동 무료배달 / 갈현동,불광동 배달료 1,000원');
INSERT INTO `sb_store` VALUES (60, 0, '3S', 1, 1, '부산하단', '051-291-5801', 'https://store.naver.com/restaurants/detail?id=829392317', '', '49325', '부산 사하구 승학로3번길 23 (하단동, 섬진아파트1차)', '부산 사하구 하단동 529-13', '2018-02-27 11:07:27', NULL, NULL, NULL, NULL);
INSERT INTO `sb_store` VALUES (61, 0, '1S', 1, 1, '홍대연남', '02-6339-5802', 'https://store.naver.com/restaurants/detail?entry=plt&id=519680842', '', '03982', '서울 마포구 동교로 242-4 (연남동)', '서울 마포구 연남동 260-26', '2018-02-27 11:07:27', 'q||p||gc', '가게밑 무료주차, 공영주차장 이용가능', '연남동, 연희동, 서교동, 신촌동', '무료배달');
INSERT INTO `sb_store` VALUES (62, 0, '3S', 1, 1, '수원신동', '031-205-5801', 'https://store.naver.com/restaurants/detail?id=657803618', '', '16683', '경기 수원시 영통구 권선로882번길 31-51 (신동)', '경기 수원시 영통구 신동 933-8', '2018-02-27 11:07:27', 'p||r||gc', '무료주차가능', '', '');
INSERT INTO `sb_store` VALUES (63, 0, '5S', 1, 1, '제주올레시장', '064-733-6373', 'https://store.naver.com/restaurants/detail?entry=plt&id=525655791', '', '63591', '제주특별자치도 서귀포시 중앙로54번길 18 (서귀동)', '제주특별자치도 서귀포시 서귀동 291-75', '2018-02-27 11:07:27', 'p||gc', '공영주차장 맞은편에 위치(유료)', '', '');
INSERT INTO `sb_store` VALUES (64, 0, '1S', 1, 1, '수원호매실', '031-295-5802', 'https://store.naver.com/restaurants/detail?id=690657500', '', '16388', '경기 수원시 권선구 금곡로102번길 45 (금곡동)', '경기 수원시 권선구 금곡동 1086-2', '2018-02-27 11:07:27', 'q||p||gc', '주차공간 협소', '금곡동, 호매실동, 탑동, 구운동, 당수동', '탑동,구운동,당수동은 배달료 2,000원');
INSERT INTO `sb_store` VALUES (65, 0, '5S', 1, 1, '대구황금', '053-755-5802', 'https://store.naver.com/restaurants/detail?id=695454975', '', '42108', '대구 수성구 청호로67길 76-5 (황금동)', '대구 수성구 황금동 132-5', '2018-02-27 11:07:27', NULL, NULL, NULL, NULL);
INSERT INTO `sb_store` VALUES (66, 0, '1S', 1, 1, '경남합천', '055-932-5802', 'https://store.naver.com/restaurants/detail?id=236577729', '', '50231', '경남 합천군 합천읍 대야로 922', '경남 합천군 합천읍 합천리 1614', '2018-02-27 11:07:27', 'q||p||gc', '매장앞 도로 아무곳에 주차가능', '합천읍 합천리', '무료배달');
INSERT INTO `sb_store` VALUES (67, 0, '3S', 1, 1, '아산배방', '041-534-5802', 'https://store.naver.com/restaurants/detail?id=466138274', '', '31480', '충남 아산시 배방읍 모산로 101', '충남 아산시 배방읍 공수리 1571', '2018-02-27 11:07:27', NULL, NULL, NULL, NULL);
INSERT INTO `sb_store` VALUES (68, 0, '3S', 1, 1, '부천중동', '032-620-5805', 'https://store.naver.com/restaurants/detail?id=290070933', '', '14549', '경기 부천시 신흥로 178 (중동)', '경기 부천시 중동 1109-2', '2018-02-27 11:07:27', 'q||p||gc', '2시간 무료주차가능', '부천', '부천지역 : 배민라이더스(앱주문), 위브더스테이트 단지 : 자체배송(전화주문)');
INSERT INTO `sb_store` VALUES (69, 0, '1S', 1, 1, '오산세교', '031-372-0802', 'https://store.naver.com/restaurants/detail?id=881124276', '', '18108', '경기 오산시 수목원로468번길 6-1 (금암동)', '경기 오산시 금암동 500-1', '2018-02-27 11:07:27', 'q||p||r||gc', '무료주차가능', '오산시', '오산 전지역 배달료 2,000원');
INSERT INTO `sb_store` VALUES (70, 0, '3S', 1, 1, '대전봉명', '042-825-5801', 'https://store.naver.com/restaurants/detail?id=652999342', '', '34185', '대전 유성구 대학로 60 (봉명동)', '', '2018-02-27 11:07:27', 'q||p||r', '무료주차가능', '대전시 유성구', '배달료 2,000-3000원');
INSERT INTO `sb_store` VALUES (71, 0, '3S', 1, 1, '김포운양', '031-989-5802', 'https://store.naver.com/restaurants/detail?id=611781726', '', '10073', '경기 김포시 김포한강11로 288-31 (운양동)', '경기 김포시 운양동 1296-9', '2018-02-27 11:07:27', 'q||p||gc', '2시간 무료주차가능', '김포 장기동, 운양동', '20,000원이상배달, 2~4km(운양동,장기동,구래동),운양동 무료배달 / 장기동 배달료 1,000원 / 그외지역 배달료 2,000원추가');
INSERT INTO `sb_store` VALUES (72, 0, '3S', 1, 1, '경남거창', '055-945-5802', 'https://store.naver.com/restaurants/detail?id=395413725', '', '50139', '경남 거창군 거창읍 상동길 4', '', '2018-02-27 11:07:27', 'q||gc', '', '거창 읍내', '30,000원미만 배달료 3,000원 / 30,000원이상 무료배달');
INSERT INTO `sb_store` VALUES (73, 0, '1S', 1, 1, '창원상남', '055-266-5802', 'https://store.naver.com/restaurants/detail?entry=plt&id=760671947', '', '51494', '경남 창원시 성산구 중앙대로 90 (상남동)', '경남 창원시 성산구 상남동 75-3', '2018-02-27 11:07:27', NULL, NULL, NULL, NULL);
INSERT INTO `sb_store` VALUES (74, 0, 'CS', 2, 1, '서울왕십리', '02-2295-5802', 'https://store.naver.com/restaurants/detail?id=249159561', '', '04701', '서울 성동구 왕십리로 410 (하왕십리동, 센트라스)', '', '2018-02-27 11:07:27', NULL, NULL, NULL, NULL);
INSERT INTO `sb_store` VALUES (75, 0, 'CS', 2, 1, '인천서창2지구', '032-466-5801', 'https://store.naver.com/restaurants/detail?id=545080763', '', '21617', '인천 남동구 서창남로 51 (서창동)', '인천 남동구 서창동 707-2', '2018-02-27 11:07:27', NULL, NULL, NULL, NULL);
INSERT INTO `sb_store` VALUES (76, 0, '3S', 1, 1, '부천옥길', '032-345-5802', 'https://store.naver.com/restaurants/detail?id=791277441', '', '14784', '경기 부천시 옥길로 123 (옥길동)', '경기 부천시 옥길동 726-1', '2018-02-27 11:07:27', 'p||gc', '무료주차가능', '', '');
INSERT INTO `sb_store` VALUES (77, 0, 'CS', 2, 1, '광명소하', '02-899-5801', 'https://store.naver.com/restaurants/detail?id=880308005', '', '14316', '경기 광명시 소하로109번길 19 (소하동)', '경기 광명시 소하동 1338-1', '2018-02-27 11:07:27', 'q||p||gc', '번영회 공영주차장(매장에서 주차권발급),건물지하주차장B1~2(무료주차)', '일직동 소하동 하안동 철산동 광명동 독산동', '2만원이상부터 배달가능 소하동,독산동1천원 하안동2천원 그외동3천원');
INSERT INTO `sb_store` VALUES (78, 0, '3S', 1, 1, '서울잠실', '02-6404-5801', 'https://store.naver.com/restaurants/detail?id=500367877', '', '05560', '서울 송파구 백제고분로7길 24-7 (잠실동)', '서울 송파구 잠실동 190-1', '2018-02-27 11:07:27', NULL, NULL, NULL, NULL);
INSERT INTO `sb_store` VALUES (79, 0, '3S', 1, 1, '화성시청', '031-356-6302', 'https://store.naver.com/restaurants/detail?id=904462135', '', '18270', '경기 화성시 남양읍 시청로160번길 10', '경기 화성시 남양읍 남양리 산 139-65', '2018-02-27 11:07:27', NULL, NULL, NULL, NULL);
INSERT INTO `sb_store` VALUES (80, 0, '3S', 1, 1, '거제수월', '055-638-5802', 'https://store.naver.com/restaurants/detail?entry=plt&id=947123371', '', '53237', '경남 거제시 거제대로 4537-1 (수월동)', '경남 거제시 수월동 1043-109', '2018-02-27 11:07:27', NULL, NULL, NULL, NULL);
INSERT INTO `sb_store` VALUES (81, 0, 'CS', 2, 1, '용인흥덕', '031-216-0801', 'https://store.naver.com/restaurants/detail?id=1840751826', '', '16954', '경기 용인시 기흥구 흥덕2로65번길 12-17 (영덕동)', '경기 용인시 기흥구 영덕동 992-3', '2018-02-27 11:07:27', 'q||p||gc', '주차 4대 가능', '영덕동,원천동,영통,광교일부', '배달료 2,000원');
INSERT INTO `sb_store` VALUES (82, 0, '3S', 1, 1, '고양화정', '031-967-5802', 'https://store.naver.com/restaurants/detail?id=1488420102', '', '10497', '경기 고양시 덕양구 화중로104번길 28 (화정동)', '경기 고양시 덕양구 화정동 966-1', '2018-02-27 11:07:27', 'q||p||gc', '2시간 무료주차가능', '화정동, 행신동, 토당동, 성사동, 주교동', '15,000원이상 무료배달 / 성사,주교동 배달료 1,000원');
INSERT INTO `sb_store` VALUES (83, 0, '1S', 1, 1, '구리갈매', '031-573-5801', 'https://store.naver.com/restaurants/detail?entry=plt&id=1887886383', '', '11901', '경기 구리시 갈매중앙로 79 (갈매동)', '경기 구리시 갈매동 605-3', '2018-02-27 11:07:27', 'q||p', '지하주차장 현재 무료주차가능', '갈매동, 별내동, 신내동 우디안 아파트만', '갈매동 무료/별내동 1,000원/신내동 우디안아파트 1,000원');
INSERT INTO `sb_store` VALUES (84, 0, '3S', 1, 1, '전주송천', '063-254-5802', 'https://store.naver.com/restaurants/detail?id=1831124898', '', '54823', '전북 전주시 덕진구 솔내로 152 (송천동1가)', '전북 전주시 덕진구 송천동1가 107-15', '2018-02-27 11:07:27', 'q||p||gc', '2시간무료주차가능', '송천동,덕진동,하가지구,호성동,금암동', '송천동 배달료 2,000원 그 외지역 배달료 3,000원');
INSERT INTO `sb_store` VALUES (85, 0, '1S', 1, 1, '울산언양', '052-254-5802', 'https://store.naver.com/restaurants/detail?id=1637864477', '', '44945', '울산 울주군 언양읍 헌양길 167', '울산 울주군 언양읍 서부리 176-3', '2018-02-27 11:07:27', 'q||p||gc', '무료주차가능', '언양 전지역', '35,000원이상 무료배달, 배달거리에 따라 추가비용 발생됩니다.');
INSERT INTO `sb_store` VALUES (86, 0, 'CS', 2, 1, '화성향남2지구', '031-353-5758', 'https://store.naver.com/restaurants/detail?id=1387487491', '', '18606', '경기 화성시 향남읍 한절이길 10', '경기 화성시 향남읍 하길리 1452-6', '2018-02-27 11:07:27', NULL, NULL, NULL, NULL);
INSERT INTO `sb_store` VALUES (87, 0, 'CS', 2, 2, '서울창동', '02-903-5802', 'https://store.naver.com/restaurants/detail?id=1019916123', '', '01455', '서울 도봉구 도봉로114길 22-7 (창동)', '서울 도봉구 창동 657-95', '2018-02-27 11:07:27', NULL, NULL, NULL, NULL);
INSERT INTO `sb_store` VALUES (88, 0, '1S', 1, 2, '경주보문', '054-771-5802', 'https://store.naver.com/restaurants/detail?entry=plt&id=1922262476', '', '38116', '경북 경주시 보문로 465-67 (신평동)', '경북 경주시 신평동 150-10', '2018-02-27 11:07:27', 'p||r||gc', '무료주차가능', '', '');
INSERT INTO `sb_store` VALUES (89, 0, '1S', 1, 2, '강릉중앙', '033-645-5802', 'https://store.naver.com/restaurants/detail?entry=plt&id=1930373566', '', '25540', '강원 강릉시 금성로14번길 5-2 (금학동)', '강원 강릉시 금학동 8-4', '2018-02-27 11:07:27', NULL, NULL, NULL, NULL);
INSERT INTO `sb_store` VALUES (90, 0, 'CS', 2, 2, '부산명지', '051-201-5802', 'https://store.naver.com/restaurants/detail?id=1699251365', '', '46765', '부산 강서구 명지오션시티4로 94 (명지동)', '부산 강서구 명지동 3237-12', '2018-02-27 11:07:27', NULL, NULL, NULL, NULL);
INSERT INTO `sb_store` VALUES (91, 0, '5S', 1, 2, '인천송도', '032-822-5802', 'https://store.naver.com/restaurants/detail?id=1760465546', '', '21984', '인천 연수구 송도국제대로 157 (송도동)', '인천 연수구 송도동 168-2', '2018-02-27 11:07:27', 'q||p||r||gc', '무료주차가능', '송도 신도시', '배달료 3,000원');

SET FOREIGN_KEY_CHECKS = 1;
