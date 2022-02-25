/* eslint sort-imports: 'error' */
/* eslint sort-keys: 'error' */
import adminLogo from '!svg-sprite-loader!~/images/svg/admin-logo.svg';
import burger from '!svg-sprite-loader!~/images/svg/burger.svg';
import cartWhite from '!svg-sprite-loader!~/images/svg/cart-white.svg';
import caseIcon from '!svg-sprite-loader!~/images/svg/case.svg';
import checkedIcon from '!svg-sprite-loader!~/images/svg/checked.svg';
import chevronBottom from '!svg-sprite-loader!~/images/svg/chevron-bottom.svg';
import circleArrowRight from '!svg-sprite-loader!~/images/svg/circle-arrow-right.svg';
import codeIcon from '!svg-sprite-loader!~/images/svg/code.svg';
import codeWars from '!svg-sprite-loader!~/images/svg/codewars.svg';
import crossIcon from '!svg-sprite-loader!~/images/svg/cross.svg';
import cubeIcon from '!svg-sprite-loader!~/images/svg/cube.svg';
import editIcon from '!svg-sprite-loader!~/images/svg/edit.svg';
import exitIcon from '!svg-sprite-loader!~/images/svg/exit.svg';
import githubIcon from '!svg-sprite-loader!~/images/svg/github.svg';
import globalIcon from '!svg-sprite-loader!~/images/svg/global.svg';
import homeIcon from '!svg-sprite-loader!~/images/svg/home.svg';
import instagramIcon from '!svg-sprite-loader!~/images/svg/instagram.svg';
import introBg from '!svg-sprite-loader!~/images/svg/intro-bg.svg';
import logoIcon from '!svg-sprite-loader!~/images/svg/logo.svg';
import mailIcon from '!svg-sprite-loader!~/images/svg/mail.svg';
import moonIcon from '!svg-sprite-loader!~/images/svg/moon.svg';
import noticeIcon from '!svg-sprite-loader!~/images/svg/notice.svg';
import ordersIcon from '!svg-sprite-loader!~/images/svg/orders.svg';
import postIntroBg from '!svg-sprite-loader!~/images/svg/postIntro-bg.svg';
import profileIcon from '!svg-sprite-loader!~/images/svg/profile.svg';
import rotateIcon from '!svg-sprite-loader!~/images/svg/rotate.svg';
import searchBlue from '!svg-sprite-loader!~/images/svg/search-blue.svg';
import searchIcon from '!svg-sprite-loader!~/images/svg/search.svg';
import sendIcon from '!svg-sprite-loader!~/images/svg/send.svg';
import settingsIcon from '!svg-sprite-loader!~/images/svg/settings.svg';
import shadowIcon from '!svg-sprite-loader!~/images/svg/shadow.svg';
import shareIcon from '!svg-sprite-loader!~/images/svg/share.svg';
import sunIcon from '!svg-sprite-loader!~/images/svg/sun.svg';
import telegramIcon from '!svg-sprite-loader!~/images/svg/telegram.svg';
// import thumbsDown from '!svg-sprite-loader!~/images/svg/thumbsDown.svg';
// import thumsUp from '!svg-sprite-loader!~/images/svg/thumsUp.svg';
import trashIcon from '!svg-sprite-loader!~/images/svg/trash.svg';

const ICONS = {
  adminLogo,
  burger,
  cartWhite,
  caseIcon,
  checkedIcon,
  chevronBottom,
  circleArrowRight,
  codeIcon,
  codeWars,
  crossIcon,
  cubeIcon,
  editIcon,
  exitIcon,
  githubIcon,
  globalIcon,
  homeIcon,
  instagramIcon,
  introBg,
  logoIcon,
  mailIcon,
  moonIcon,
  noticeIcon,
  ordersIcon,
  postIntroBg,
  profileIcon,
  rotateIcon,
  searchBlue,
  searchIcon,
  sendIcon,
  settingsIcon,
  shadowIcon,
  shareIcon,
  sunIcon,
  telegramIcon,
  trashIcon,
};

function camelCaseToDash(str) {
  return str.replace(/([a-zA-Z])(?=[A-Z])/g, '$1-').toLowerCase();
}

Object.keys(ICONS).forEach((key) => {
  const dashKey = camelCaseToDash(key);
  ICONS[dashKey] = ICONS[key];
});

export default ICONS;
