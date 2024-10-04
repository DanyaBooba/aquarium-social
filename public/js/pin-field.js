function _defineProperties(target, props) {
  for (var i = 0; i < props.length; i++) {
    var descriptor = props[i];
    descriptor.enumerable = descriptor.enumerable || false;
    descriptor.configurable = true;
    if ("value" in descriptor) descriptor.writable = true;
    Object.defineProperty(target, descriptor.key, descriptor);
  }
}

function _createClass(Constructor, protoProps, staticProps) {
  if (protoProps) _defineProperties(Constructor.prototype, protoProps);
  if (staticProps) _defineProperties(Constructor, staticProps);
  return Constructor;
}

function _inheritsLoose(subClass, superClass) {
  subClass.prototype = Object.create(superClass.prototype);
  subClass.prototype.constructor = subClass;

  _setPrototypeOf(subClass, superClass);
}

function _getPrototypeOf(o) {
  _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) {
    return o.__proto__ || Object.getPrototypeOf(o);
  };
  return _getPrototypeOf(o);
}

function _setPrototypeOf(o, p) {
  _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) {
    o.__proto__ = p;
    return o;
  };

  return _setPrototypeOf(o, p);
}

function _isNativeReflectConstruct() {
  if (typeof Reflect === "undefined" || !Reflect.construct) return false;
  if (Reflect.construct.sham) return false;
  if (typeof Proxy === "function") return true;

  try {
    Boolean.prototype.valueOf.call(Reflect.construct(Boolean, [], function () {}));
    return true;
  } catch (e) {
    return false;
  }
}

function _construct(Parent, args, Class) {
  if (_isNativeReflectConstruct()) {
    _construct = Reflect.construct;
  } else {
    _construct = function _construct(Parent, args, Class) {
      var a = [null];
      a.push.apply(a, args);
      var Constructor = Function.bind.apply(Parent, a);
      var instance = new Constructor();
      if (Class) _setPrototypeOf(instance, Class.prototype);
      return instance;
    };
  }

  return _construct.apply(null, arguments);
}

function _isNativeFunction(fn) {
  return Function.toString.call(fn).indexOf("[native code]") !== -1;
}

function _wrapNativeSuper(Class) {
  var _cache = typeof Map === "function" ? new Map() : undefined;

  _wrapNativeSuper = function _wrapNativeSuper(Class) {
    if (Class === null || !_isNativeFunction(Class)) return Class;

    if (typeof Class !== "function") {
      throw new TypeError("Super expression must either be null or a function");
    }

    if (typeof _cache !== "undefined") {
      if (_cache.has(Class)) return _cache.get(Class);

      _cache.set(Class, Wrapper);
    }

    function Wrapper() {
      return _construct(Class, arguments, _getPrototypeOf(this).constructor);
    }

    Wrapper.prototype = Object.create(Class.prototype, {
      constructor: {
        value: Wrapper,
        enumerable: false,
        writable: true,
        configurable: true
      }
    });
    return _setPrototypeOf(Wrapper, Class);
  };

  return _wrapNativeSuper(Class);
}

var IGNORED_META_KEYS = ["Alt", "Control", "Enter", "Meta", "Shift", "Tab"];

function range(start, length) {
  return Array.from({
    length: length
  }, function (_, i) {
    return i + start;
  });
}

function getPrevInputIdx(cursor) {
  return Math.max(0, cursor - 1);
}

function getNextInputIdx(cursor, max) {
  if (max === 0) return 0;
  return Math.min(cursor + 1, max - 1);
}

var PinField = /*#__PURE__*/function (_HTMLElement) {
  _inheritsLoose(PinField, _HTMLElement);

  function PinField() {
    var _this;

    _this = _HTMLElement.apply(this, arguments) || this;
    /**
     * Current input focus cursor.
     */

    _this.cursor = 0;
    /**
     * Actions stack.
     */

    _this.actions = [];
    /**
     * Effects stack.
     */

    _this.effects = [];
    /**
     * State-holder fallback for old browsers and mobile support.
     */

    _this.fallback = null;
    /**
     * List of HTMLInputElement the PIN Field is composed of.
     */

    _this.inputs = [];
    /**
     * Length of the field.
     */

    _this.length = 5;
    /**
     * Validator.
     */

    _this.validate = /^[a-zA-Z0-9]$/;
    /**
     * Formatter.
     */

    _this.format = function (key) {
      return key;
    };

    return _this;
  }
  /**
   * Wrapper around the validator (for internal use).
   */


  var _proto = PinField.prototype;

  _proto.isKeyAllowed = function isKeyAllowed(key) {
    if (!key) return false;
    if (key.length > 1) return false;
    if (typeof this.validate === "string") return this.validate.split("").includes(key);
    if (this.validate instanceof Array) return this.validate.includes(key);
    if (this.validate instanceof RegExp) return this.validate.test(key);
    return this.validate(key);
  }
  /**
   * Logger.
   */
  ;

  _proto.log = function log(scope, fn, msg) {
    if (this.debug) {
      console.debug("[PIN Field] (" + scope + ") " + fn + (msg ? ": " + msg : ""));
    }
  }
  /**
   * Debug getter.
   */
  ;

  /**
   * Attribute changed callback.
   */
  _proto.attributeChangedCallback = function attributeChangedCallback(name, prevVal, nextVal) {
    var _this2 = this;

    if (prevVal !== nextVal) {
      switch (name) {
        case "debug":
          {
            this.debug = nextVal !== null;
            break;
          }

        case "disabled":
          {
            this.inputs.forEach(function (i) {
              return i.disabled = _this2.disabled;
            });
            break;
          }
      }
    }
  }
  /**
   * Connected callback.
   */
  ;

  _proto.connectedCallback = function connectedCallback() {
    var _this3 = this;

    if (this.hasAttribute("length")) {
      this.length = Number(this.getAttribute("length")) || 5;

      if (this.length < 1) {
        throw new RangeError("The PIN Field length should be greater than 0 (got " + this.length + ")");
      }
    }

    var validate = this.getAttribute("validate");

    if (typeof validate === "string") {
      this.validate = validate;
    }

    var input = document.createElement("input");
    input.autocapitalize = "off";
    input.autocomplete = "off";
    input.inputMode = "text";
    var clearAttrs = [];

    var _loop = function _loop(i) {
      var attr = _this3.attributes[i];

      if (!["id", "autofocus", "debug"].includes(attr.name)) {
        input.setAttribute(attr.name, attr.value);
        clearAttrs.push(function () {
          return attr && _this3.removeAttribute(attr.name);
        });
      }
    };

    for (var i = 0; i < this.attributes.length; i++) {
      _loop(i);
    }

    this.append.apply(this, range(0, this.length).map(function (idx) {
      var inputClone = input.cloneNode(true);

      if (idx === 0 && _this3.hasAttribute("autofocus")) {
        inputClone.setAttribute("autofocus", "");

        _this3.removeAttribute("autofocus");
      }

      _this3.inputs.push(inputClone);

      return inputClone;
    }));
    var tpl = document.createElement("slot");
    var css = document.createElement("style");
    css.innerText = ":host{display:flex;}";
    this.attachShadow({
      mode: "open"
    }).append(css, tpl);
    clearAttrs.forEach(function (clear) {
      return clear();
    });
    this.inputs.forEach(function (input, idx) {
      input.addEventListener("keydown", _this3.handleKeyDown(idx));
      input.addEventListener("keyup", _this3.handleKeyUp(idx));
      input.addEventListener("paste", _this3.handlePaste(idx));
    });
  }
  /**
   * Disconnected callback.
   */
  ;

  _proto.disconnectedCallback = function disconnectedCallback() {
    var _this4 = this;

    this.inputs.forEach(function (input, idx) {
      input.removeEventListener("keydown", _this4.handleKeyDown(idx));
      input.removeEventListener("keyup", _this4.handleKeyUp(idx));
      input.removeEventListener("paste", _this4.handlePaste(idx));
    });
  }
  /**
   * Set a value starting from a specific index using the effects stack.
   */
  ;

  _proto.applySetValAt = function applySetValAt(idx, val) {
    if (val.split("").slice(0, this.length).every(this.isKeyAllowed.bind(this))) {
      var _this$effects;

      var pasteLen = Math.min(val.length, this.length - idx);
      var nextCursor = getNextInputIdx(pasteLen + idx - 1, this.length);

      (_this$effects = this.effects).push.apply(_this$effects, [{
        type: "handle-code-change"
      }, {
        type: "focus-input",
        idx: nextCursor
      }].concat(range(0, pasteLen).flatMap(function (i) {
        return [{
          type: "set-input-val",
          idx: idx + i,
          val: val[i]
        }, {
          type: "resolve-key",
          idx: idx + i,
          key: val[i]
        }];
      })));
    } else {
      this.effects.push({
        type: "handle-code-change"
      }, {
        type: "reject-key",
        idx: idx,
        key: val
      }, {
        type: "set-input-val",
        idx: idx,
        val: ""
      });
    }
  }
  /**
   * Execute all actions present in the stack.
   * An action should mutate internal state and generate effects.
   */
  ;

  _proto.executeAll = function executeAll() {
    while (this.actions.length > 0) {
      var action = this.actions.pop();

      switch (action.type) {
        case "handle-key-down":
          {
            this.log("action", "handle-key-down", "key=" + action.key);

            switch (action.key) {
              case "Unidentified":
                {
                  this.fallback = {
                    idx: action.idx,
                    val: action.val
                  };
                  break;
                }

              case "Dead":
                {
                  this.effects = [{
                    type: "handle-code-change"
                  }, {
                    type: "reject-key",
                    idx: action.idx,
                    key: action.key
                  }, {
                    type: "set-input-val",
                    idx: action.idx,
                    val: ""
                  }];
                  break;
                }

              case "ArrowLeft":
                {
                  this.cursor = getPrevInputIdx(action.idx);
                  this.effects = [{
                    type: "focus-input",
                    idx: this.cursor
                  }];
                  break;
                }

              case "ArrowRight":
                {
                  this.cursor = getNextInputIdx(action.idx, this.length);
                  this.effects = [{
                    type: "focus-input",
                    idx: this.cursor
                  }];
                  break;
                }

              case "Delete":
              case "Backspace":
                {
                  this.effects = [{
                    type: "handle-code-change"
                  }, {
                    type: "handle-delete",
                    idx: action.idx
                  }];
                  break;
                }

              default:
                {
                  if (this.isKeyAllowed(action.key)) {
                    this.cursor = getNextInputIdx(action.idx, this.length);
                    this.effects = [{
                      type: "handle-code-change"
                    }, {
                      type: "focus-input",
                      idx: this.cursor
                    }, {
                      type: "resolve-key",
                      idx: action.idx,
                      key: action.key
                    }, {
                      type: "set-input-val",
                      idx: action.idx,
                      val: action.key
                    }];
                  } else {
                    this.effects = [{
                      type: "reject-key",
                      idx: action.idx,
                      key: action.key
                    }];
                  }
                }
            }

            break;
          }

        case "handle-key-up":
          {
            if (!this.fallback) {
              this.log("action", "handle-key-up", "ignored");
              break;
            }

            this.log("action", "handle-key-up");
            var _this$fallback = this.fallback,
                idx = _this$fallback.idx,
                prevVal = _this$fallback.val;
            var val = action.val;

            if (prevVal === "" && val === "") {
              this.effects.push({
                type: "handle-delete",
                idx: idx
              }, {
                type: "handle-code-change"
              });
            } else if (prevVal !== "" && val !== "") {
              val = prevVal === val[0] ? val.substring(1) : val.substring(0, val.length - 1);
              this.applySetValAt(idx, val);
            } else if (val !== "") {
              this.applySetValAt(idx, val);
            }

            this.fallback = null;
            break;
          }

        case "handle-paste":
          {
            this.applySetValAt(action.idx, action.val);
            break;
          }
      }
    }
  }
  /**
   * Apply all effects present in the stack.
   * An effect is an action with side-effects.
   */
  ;

  _proto.applyAll = function applyAll() {
    while (this.effects.length > 0) {
      var eff = this.effects.pop();

      switch (eff.type) {
        case "focus-input":
          {
            this.log("effect", "focus-input", "idx=" + eff.idx);
            this.inputs[eff.idx].focus();
            break;
          }

        case "set-input-val":
          {
            this.log("effect", "set-input-val", "idx=" + eff.idx + ",val=" + eff.val);
            var val = this.format(eff.val);
            this.inputs[eff.idx].value = val;
            break;
          }

        case "resolve-key":
          {
            this.log("effect", "resolve-key", "idx=" + eff.idx + ",key=" + eff.key);
            this.inputs[eff.idx].setCustomValidity("");
            this.dispatchEvent(new CustomEvent("resolve", {
              detail: {
                key: eff.key
              }
            }));
            break;
          }

        case "reject-key":
          {
            this.log("effect", "reject-key", "idx=" + eff.idx + ",key=" + eff.key);
            this.inputs[eff.idx].setCustomValidity("Invalid key");
            this.dispatchEvent(new CustomEvent("reject", {
              detail: {
                key: eff.key
              }
            }));
            break;
          }
        // TODO: split into existing effects

        case "handle-delete":
          {
            this.log("effect", "handle-delete", "idx=" + eff.idx);
            var prevVal = this.inputs[eff.idx].value;
            this.inputs[eff.idx].setCustomValidity("");
            this.inputs[eff.idx].value = "";

            if (!prevVal) {
              var prevIdx = getPrevInputIdx(eff.idx);
              this.inputs[prevIdx].focus();
              this.inputs[prevIdx].setCustomValidity("");
              this.inputs[prevIdx].value = "";
            }

            break;
          }

        case "handle-code-change":
          {
            var dir = (document.documentElement.getAttribute("dir") || "ltr").toLowerCase();
            var codeArr = this.inputs.map(function (r) {
              return r.value.trim();
            });
            var value = (dir === "rtl" ? codeArr.reverse() : codeArr).join("");
            this.log("effect", "handle-code-change", "val={" + value + "}");
            this.dispatchEvent(new CustomEvent("change", {
              detail: {
                value: value
              }
            }));

            if (value.length === this.length) {
              this.setAttribute("completed", "");
              this.dispatchEvent(new CustomEvent("complete", {
                detail: {
                  value: value
                }
              }));
            } else {
              this.removeAttribute("completed");
            }

            break;
          }
      }
    }
  }
  /**
   * Execute all actions, then apply all effects.
   */
  ;

  _proto.render = function render() {
    this.executeAll();
    this.applyAll();
  }
  /**
   * Wrapper around key down event handler.
   */
  ;

  _proto.handleKeyDown = function handleKeyDown(idx) {
    var _this5 = this;

    return function (evt) {
      if (IGNORED_META_KEYS.includes(evt.key) || evt.ctrlKey || evt.altKey || evt.metaKey) {
        _this5.log("handleKeyDown", "ignored", "idx=" + idx + ",key=" + evt.key);

        return;
      }

      if (evt.target instanceof HTMLInputElement) {
        evt.preventDefault();
        var val = evt.target.value;

        _this5.log("handleKeyDown", "triggered", "idx=" + idx + ",key=" + evt.key + ",val=" + val);

        _this5.actions.push({
          type: "handle-key-down",
          idx: idx,
          key: evt.key,
          val: val
        });

        _this5.render();
      }
    };
  }
  /**
   * Wrapper around key up event handler.
   */
  ;

  _proto.handleKeyUp = function handleKeyUp(idx) {
    var _this6 = this;

    return function (evt) {
      if (evt.target instanceof HTMLInputElement) {
        var val = evt.target.value;

        _this6.log("handleKeyUp", "triggered", "idx=" + idx + ",val=" + val);

        _this6.actions.push({
          type: "handle-key-up",
          idx: idx,
          val: val
        });

        _this6.render();
      }
    };
  }
  /**
   * Wrapper around paste event handler.
   */
  ;

  _proto.handlePaste = function handlePaste(idx) {
    var _this7 = this;

    return function (evt) {
      evt.preventDefault();
      var val = evt.clipboardData ? evt.clipboardData.getData("Text") : "";

      _this7.log("handlePaste", "triggered", "idx=" + idx + ",val=" + val);

      _this7.actions.push({
        type: "handle-paste",
        idx: idx,
        val: val
      });

      _this7.render();
    };
  };

  _createClass(PinField, [{
    key: "debug",
    get: function get() {
      return this.hasAttribute("debug");
    }
    /**
     * Debug setter.
     */
    ,
    set: function set(val) {
      if (val) {
        this.setAttribute("debug", "");
      } else {
        this.removeAttribute("debug");
      }
    }
    /**
     * Disabled getter.
     */

  }, {
    key: "disabled",
    get: function get() {
      return this.hasAttribute("disabled");
    }
    /**
     * Disabled setter.
     */
    ,
    set: function set(val) {
      if (val) {
        this.setAttribute("disabled", "");
      } else {
        this.removeAttribute("disabled");
      }
    }
    /**
     * List of observed attributes.
     */

  }], [{
    key: "observedAttributes",
    get: function get() {
      return ["debug", "disabled"];
    }
  }]);

  return PinField;
}( /*#__PURE__*/_wrapNativeSuper(HTMLElement));
customElements.define("swd-pin-field", PinField);

export default PinField;
export { PinField };
