import { Injectable } from "@angular/core";
import { Actions, createEffect, ofType } from "@ngrx/effects";
import { catchError, map, switchMap } from "rxjs/operators";
import { EMPTY } from "rxjs";

import { ContentApiService } from "src/app/api";
import * as actions from "./content.actions";

@Injectable()
export class ContentEffects {
    constructor(private actions$: Actions,
                private api: ContentApiService
    ) {
    }

    loadContent$ = createEffect(
        () => this.actions$.pipe(ofType(actions.load), switchMap(() =>
                this.api.getContents().pipe(
                    map(actions.loadSuccess),
                    catchError(() => EMPTY)
                )
            )
        )
    );

}
