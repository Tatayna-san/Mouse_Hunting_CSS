
let sizeDisplay = document.body.clientWidth;
let thislevelcomplete = false;

window.addEventListener("resize", () => {
  sizeDisplay = document.body.clientWidth;
})
let levels = null;
let levelsave;
let max_group = 0;
function loadlevel(lev, gr = group, changeurl = true) {
    for(let x in levels) {
        if (levels[x].number == lev && levels[x]["group_"] == gr) {
            document.querySelector(".leveltext").innerHTML = levels[x].description;
            document.querySelector(".game-display").innerHTML = levels[x].area;
            document.querySelector(".code-area__write .levelobj").innerHTML = levels[x].code_table;
            if (changeurl == true) {
                window.history.pushState(null, null, `/game/?level=${lev}&group=${gr}`);
            }
            document.querySelector("title").innerHTML = "Mouse Hunting CSS | " + lev + " уровень " + gr + " группа";
                for(let xx in levelsave) {
                    if (levelsave[xx].level == lev && levelsave[xx].level_group == group) {
                        answ = JSON.parse(levelsave[xx].answer);
                        for (let xxx in answ) {
                            if ((Object.entries(answ[xxx])[0][1]) != "") {
                                document.querySelector(`.code-input[data-selector="${Object.entries(answ[xxx])[0][0]}"]`).value = (Object.entries(answ[xxx])[0][1]).replaceAll("<br>", "\n");
                            }
                        }
                    }
                }
            addCheckInputs();
            if (document.querySelector(".code-area .big-codearea")) {
                document.querySelector(".code-area").classList.add("big_codearea");
            } else {
                document.querySelector(".code-area").classList.remove("big_codearea");
            }
        }
    }
}

document.addEventListener("DOMContentLoaded", () => {
  loadgame();
  window.onpopstate = () => {
      let thisurl = new URL(window.location.href);
      if (thisurl.searchParams.get("level")) {
          menuupdate(Number(thisurl.searchParams.get("level")), Number(thisurl.searchParams.get("group")), false);
      }
  }
})
async function loadsaves() {
  let b = new URLSearchParams();
  b.append('group', group);
  let f = await fetch("/modules/loadsaves.php", {body: b, method: "post"});
  levelsave = await f.text();
  if (levelsave) {
      levelsave = JSON.parse(levelsave);
  }
  for (let x in levels) {
      if (Number(levels[x]["group_"]) > Number(max_group)) {
          max_group = Number(levels[x]["group_"]);
      }
  }
  loadlevel(levelselect);
  menuupdate(levelselect);
} 
function checkwin() {
  let truee = 0;
  let truecat = 0;
  let countcat = 0;
  document.querySelectorAll(`.cat`).forEach(function(catt) {
    countcat += 1;
    let x1 = true;
    if (catt.classList.contains("typecat")) {
      let typecatt;
      if (catt.classList.contains("type1")) {
        typecatt = "type1";
      } else if (catt.classList.contains("type2")) {
        typecatt = "type2";
      } else if (catt.classList.contains("type3")) {
        typecatt = "type3";
      } else if (catt.classList.contains("type4")) {
        typecatt = "type4";
      }
      document.querySelectorAll(`.mouse.${typecatt}`).forEach(function(mouss) {
        if (x1 == true) {
          if (sizeDisplay > 700) {
            if (Math.abs((catt.offsetLeft + 100) - (mouss.offsetLeft + 50)) < 100) {
              if (Math.abs((catt.offsetTop + 100) - (mouss.offsetTop + 50)) < 100) {
                truecat++;
                x1 = false
              }
            }
          } else {
            if (Math.abs((catt.offsetLeft + 75) - (mouss.offsetLeft + 35)) < 100) {
              if (Math.abs((catt.offsetTop + 75) - (mouss.offsetTop + 35)) < 100) {
                truecat++;
                x1 = false
              }
            }
          }
          
        }
      })
    } else {
      document.querySelectorAll(`.mouse`).forEach(function(mouss) {
        if (x1 == true) {
          if (sizeDisplay > 700) {
            if (Math.abs((catt.offsetLeft + 100) - (mouss.offsetLeft + 50)) < 100) {
              if (Math.abs((catt.offsetTop + 100) - (mouss.offsetTop + 50)) < 100) {
                truecat++;
                x1 = false
              }
            }
          } else {
            if (Math.abs((catt.offsetLeft + 75) - (mouss.offsetLeft + 35)) < 100) {
              if (Math.abs((catt.offsetTop + 75) - (mouss.offsetTop + 35)) < 100) {
                truecat++;
                x1 = false
              }
            }
          }
        }
      })
    }
  })
  if (countcat == truecat) {
    document.querySelectorAll(`.cat:not(.food)`).forEach(function(changeimg) {
      changeimg.classList.remove("nofood");
      changeimg.classList.add("food");
    })
    document.querySelectorAll(".button-next").forEach(function(butnext) {
      butnext.classList.remove("blocked");
    })
    thislevelcomplete = true;
  } else {
    document.querySelectorAll(`.food`).forEach(function(changeimg) {
      changeimg.classList.remove("food");
      changeimg.classList.add("nofood");
    })
    document.querySelectorAll(".button-next").forEach(function(butnext) {
      butnext.classList.add("blocked");
    })
    thislevelcomplete = false;
  }
}

function menuupdate(level, gr = group, changeurl = true) {
  if (!changeurl) {
    levelselect = level;
    group = gr;
  }
  loadlevel(level, gr, changeurl);
  let len = 0;
  for(let x in levels) {
    if(levels[x]["group_"] == gr) {
      len += 1;
    }
  }
  document.querySelectorAll(".game-page__menu-centre").forEach(function(menu) {
    menu.innerHTML = `<p>Уровень ${level} из ${len}</p><div class="arrow-down"></div>`
  })
  document.querySelectorAll(".game-menu-item").forEach(function(item) {
    if (item.dataset.level != level || item.dataset.group != group) {
      item.classList.remove("select");
    } else {
      item.classList.add("select");
    }
  });
  document.querySelectorAll(".game-page__menu-right").forEach(function(but1) {
    if (levelselect == len && group == max_group) {
      but1.classList.add("blocked");
    } else {
      but1.classList.remove("blocked");
    }
  })
  document.querySelectorAll(".button-next").forEach(function(but1) {
    if (levelselect == len && group == max_group) {
      but1.classList.add("hidden");
    } else {
      but1.classList.remove("hidden");
    }
  })
  document.querySelectorAll(".game-page__menu-left").forEach(function(but1) {
    if (levelselect == 1 && group == 1) {
      but1.classList.add("blocked");
    } else {
      but1.classList.remove("blocked");
    }
  })
  checkinputs();
}
document.addEventListener("DOMContentLoaded", function() {
  document.querySelectorAll(".game-page__menu-left").forEach(function(but) {
    but.addEventListener("click", function(cl) {
      let len = 0;
      for (let x in levels) {
        if (levels[x]["group_"] == group) {
          len += 1;
        }
      }
      if (levelselect > 1 || group != 1) {
        if (levelselect != 1) {
          levelselect--;
        } else {
          group--;
          let needlevel = 0;
          for (let x in levels) {
            if (levels[x]["group_"] == group) {
              needlevel += 1;
            }
          }
          levelselect = needlevel;
        }
        menuupdate(levelselect);
      }
    })
  })
  document.querySelectorAll(".game-page__menu-right").forEach(function(but) {
    but.addEventListener("click", function(cl) {
      let len = 0;
      for (let x in levels) {
        if (levels[x]["group_"] == group) {
          len += 1;
        }
      }
      if (levelselect < len || group != max_group) {
        if (levelselect != len) {
          levelselect++;
        } else {
          group++;
          levelselect = 1;
        }
        menuupdate(levelselect);
      }
    })
  })
  document.querySelectorAll(".button-next").forEach(function(butnext) {
    butnext.addEventListener("click", function(cl) {
      let len = 0;
      for (let x in levels) {
        if (levels[x]["group_"] == group) {
          len += 1;
        }
      }
      if (levelselect < len || group != max_group) {
        if (levelselect != len) {
          levelselect++;
        } else {
          group++;
          levelselect = 1;
        }
        menuupdate(levelselect);
      }
    })
  })
  document.querySelectorAll(".game-page__menu-centre").forEach(function(menu_but) {
    menu_but.addEventListener("click", function(cl) {
      document.querySelectorAll(".game-page__menu-level").forEach(function(menu) {
        menu.classList.toggle("close");
      })
    })
  })
  document.querySelectorAll(".game-menu-item").forEach(function(but) {
    but.addEventListener("click", function(click) {
      document.querySelectorAll(".game-menu-item").forEach(function(but1) {
        but1.classList.remove("select");
      });
      but.classList.add("select");
      levelselect = Number(but.dataset.level);
      group = Number(but.dataset.group);
      menuupdate(levelselect);
    })
  })
})

document.querySelectorAll(".code-input").forEach(function(codeinp) {
    if (!document.querySelector(`style.${(codeinp.name).replace("line-", "")}`)) {
        document.body.innerHTML += `<style class="${(codeinp.name).replace("line-", "")}"></style>`;
    }
})
async function sendLevelData(level, group, data, complete) {
    let b = new URLSearchParams();
    b.append('level', level);
    b.append('group', group);
    b.append('data', data);
    b.append('complete', complete);
    let f = await fetch("../modules/sendleveldata.php", {body: b, method: "post"});
    let t = await f.text();
}
function checkinputs() {
    let stylecode = "";
    let answer = [];
    document.querySelectorAll("textarea.code-input").forEach(function(x) {
        let inpselector = x.dataset.selector;
        let inpvalue = x.value;
        stylecode += inpselector + "{" + inpvalue + "} ";
        inpvalue = inpvalue.replaceAll("\n", "<br>");
        answer.push(`{"${inpselector}": "${inpvalue}"}`);
    })
    for(let xx in levelsave) {
      if (levelsave[xx].level == levelselect && levelsave[xx].level_group == group) {
        let answer2 = "[";
        for (let xxx in answer) {
          answer2 += answer[xxx];
          if (Number(xxx) + 1 != answer.length) {
            answer2 += ",";
          }
        }
        answer2 += "]";
        levelsave[xx].answer = answer2;
        //console.log(levelsave[xx]);
      }
    }
    document.querySelector("style.gamestyle").innerHTML = stylecode;
    checkwin();
    sendLevelData(levelselect, group, answer, thislevelcomplete);
}
function maxlines() {
    document.querySelectorAll("textarea").forEach(function(texx) {
        let maxlines = texx.rows;
        var lines = texx.value.split("\n");
        if (lines.length > maxlines) {
            texx.value = lines.slice(0, maxlines).join("\n");
        }
    })
}
function addCheckInputs() {
    document.querySelectorAll(".levelobj textarea").forEach((el) => {
      el.onchange = () => {
          maxlines();
          checkinputs();
      }
    })
}



